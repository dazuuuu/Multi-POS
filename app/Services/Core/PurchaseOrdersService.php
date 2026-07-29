<?php

namespace App\Services\Core;

use App\Models\PurchaseOrder;
use App\Services\BaseService;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class PurchaseOrdersService extends BaseService
{
    public function list(array $filters = []): LengthAwarePaginator
    {
        $query = PurchaseOrder::query()->latest();

        if (! empty($filters['search'])) {
            $search = $filters['search'];
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%");
            });
        }

        if (isset($filters['is_active'])) {
            $query->where('is_active', (bool) $filters['is_active']);
        }

        $perPage = min((int) ($filters['per_page'] ?? config('api.pagination.per_page', 15)), config('api.pagination.max_per_page', 100));

        return $query->paginate($perPage);
    }

    public function create(array $data): PurchaseOrder
    {
        return PurchaseOrder::query()->create($data);
    }

    public function find(int $id): PurchaseOrder
    {
        return PurchaseOrder::query()->findOrFail($id);
    }

    public function update(int $id, array $data): PurchaseOrder
    {
        $record = $this->find($id);
        $record->update($data);

        return $record->fresh();
    }

    public function delete(int $id): void
    {
        $this->find($id)->delete();
    }
}
