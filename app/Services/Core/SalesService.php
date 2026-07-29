<?php

namespace App\Services\Core;

use App\Models\Product;
use App\Models\Sale;
use App\Models\SaleItem;
use App\Models\SalePayment;
use App\Services\BaseService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SalesService extends BaseService
{
    public function list(array $filters = [])
    {
        $query = Sale::query()->with(['items', 'payments'])->latest();

        if (! empty($filters['status'])) {
            $query->where('status', $filters['status']);
        }

        if (! empty($filters['sale_type'])) {
            $query->where('sale_type', $filters['sale_type']);
        }

        if (! empty($filters['from'])) {
            $query->whereDate('created_at', '>=', $filters['from']);
        }

        if (! empty($filters['to'])) {
            $query->whereDate('created_at', '<=', $filters['to']);
        }

        $perPage = min((int) ($filters['per_page'] ?? 15), 100);

        return $query->paginate($perPage);
    }

    public function create(array $data): Sale
    {
        return DB::transaction(function () use ($data) {
            $items = $data['items'] ?? [];
            $payments = $data['payments'] ?? [];
            unset($data['items'], $data['payments']);

            $subtotal = 0;
            $tax = 0;
            foreach ($items as $item) {
                $line = ((float) $item['quantity'] * (float) $item['unit_price']) - (float) ($item['discount_amount'] ?? 0);
                $subtotal += $line;
                $tax += (float) ($item['tax_amount'] ?? 0);
            }

            $discount = (float) ($data['discount_amount'] ?? 0);
            $total = $subtotal + $tax - $discount;
            $paid = array_sum(array_map(fn ($p) => (float) $p['amount'], $payments));

            $sale = Sale::query()->create(array_merge($data, [
                'sale_number' => $data['sale_number'] ?? ('SALE-'.strtoupper(Str::random(8))),
                'user_id' => auth()->id(),
                'created_by' => auth()->id(),
                'subtotal' => $subtotal,
                'tax_amount' => $tax,
                'discount_amount' => $discount,
                'total_amount' => $total,
                'amount_paid' => $paid,
                'amount_due' => max(0, $total - $paid),
                'status' => $data['status'] ?? ($paid >= $total ? 'completed' : 'partial'),
            ]));

            foreach ($items as $item) {
                $lineTotal = ((float) $item['quantity'] * (float) $item['unit_price'])
                    - (float) ($item['discount_amount'] ?? 0)
                    + (float) ($item['tax_amount'] ?? 0);

                SaleItem::query()->create([
                    'sale_id' => $sale->id,
                    'product_id' => $item['product_id'] ?? null,
                    'product_name' => $item['product_name'],
                    'sku' => $item['sku'] ?? null,
                    'quantity' => $item['quantity'],
                    'unit_price' => $item['unit_price'],
                    'discount_amount' => $item['discount_amount'] ?? 0,
                    'tax_amount' => $item['tax_amount'] ?? 0,
                    'total_amount' => $lineTotal,
                ]);

                if (! empty($item['product_id'])) {
                    $product = Product::query()->find($item['product_id']);
                    // Stock decrement handled via stock_levels in Phase 9 service extensions
                }
            }

            foreach ($payments as $payment) {
                SalePayment::query()->create([
                    'sale_id' => $sale->id,
                    'payment_method' => $payment['payment_method'],
                    'amount' => $payment['amount'],
                    'reference' => $payment['reference'] ?? null,
                    'metadata' => $payment['metadata'] ?? null,
                ]);
            }

            return $sale->load(['items', 'payments']);
        });
    }

    public function find(int $id): Sale
    {
        return Sale::query()->with(['items', 'payments'])->findOrFail($id);
    }

    public function update(int $id, array $data): Sale
    {
        $sale = $this->find($id);
        unset($data['items'], $data['payments']);
        $sale->update($data);

        return $sale->fresh(['items', 'payments']);
    }

    public function delete(int $id): void
    {
        $this->find($id)->delete();
    }
}
