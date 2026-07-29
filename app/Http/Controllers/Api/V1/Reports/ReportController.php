<?php

namespace App\Http\Controllers\Api\V1\Reports;

use App\Http\Controllers\Api\V1\ApiController;
use App\Models\Customer;
use App\Models\Expense;
use App\Models\Product;
use App\Models\Sale;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends ApiController
{
    public function sales(Request $request): JsonResponse
    {
        $from = $request->input('from', now()->startOfMonth()->toDateString());
        $to = $request->input('to', now()->toDateString());

        $summary = Sale::query()
            ->whereDate('created_at', '>=', $from)
            ->whereDate('created_at', '<=', $to)
            ->selectRaw('COUNT(*) as transactions, COALESCE(SUM(total_amount),0) as revenue, COALESCE(SUM(tax_amount),0) as tax, COALESCE(SUM(discount_amount),0) as discounts')
            ->first();

        $daily = Sale::query()
            ->whereDate('created_at', '>=', $from)
            ->whereDate('created_at', '<=', $to)
            ->selectRaw('DATE(created_at) as date, COUNT(*) as transactions, COALESCE(SUM(total_amount),0) as revenue')
            ->groupBy(DB::raw('DATE(created_at)'))
            ->orderBy('date')
            ->get();

        return $this->success([
            'from' => $from,
            'to' => $to,
            'summary' => $summary,
            'daily' => $daily,
        ]);
    }

    public function inventory(): JsonResponse
    {
        $products = Product::query()->where('is_active', true)->count();
        $lowStock = Product::query()
            ->where('track_stock', true)
            ->whereColumn('reorder_level', '>', DB::raw('0'))
            ->count();

        return $this->success([
            'active_products' => $products,
            'tracked_products' => Product::query()->where('track_stock', true)->count(),
            'low_stock_candidates' => $lowStock,
        ]);
    }

    public function financials(Request $request): JsonResponse
    {
        $from = $request->input('from', now()->startOfMonth()->toDateString());
        $to = $request->input('to', now()->toDateString());

        $revenue = (float) Sale::query()->whereDate('created_at', '>=', $from)->whereDate('created_at', '<=', $to)->sum('total_amount');
        $expenses = (float) Expense::query()->whereDate('expense_date', '>=', $from)->whereDate('expense_date', '<=', $to)->sum('amount');

        return $this->success([
            'from' => $from,
            'to' => $to,
            'revenue' => $revenue,
            'expenses' => $expenses,
            'profit' => $revenue - $expenses,
        ]);
    }

    public function customers(): JsonResponse
    {
        return $this->success([
            'total' => Customer::query()->count(),
            'active' => Customer::query()->where('is_active', true)->count(),
            'with_credit' => Customer::query()->where('credit_limit', '>', 0)->count(),
        ]);
    }
}
