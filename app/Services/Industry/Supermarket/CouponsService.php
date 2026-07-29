<?php

namespace App\Services\Industry\Supermarket;

use App\Models\Industry\SupermarketCoupons;
use App\Services\BaseService;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class CouponsService extends BaseService
{
    public function list(array $filters = []): LengthAwarePaginator
    {
        $query = SupermarketCoupons::query()->latest();
        if (! empty($filters['search'])) {
            $query->where('name', 'like', '%'.$filters['search'].'%');
        }
        if (! empty($filters['status'])) {
            $query->where('status', $filters['status']);
        }
        $perPage = min((int) ($filters['per_page'] ?? 15), 100);

        return $query->paginate($perPage);
    }

    public function create(array $data): SupermarketCoupons
    {
        return SupermarketCoupons::query()->create($data);
    }

    public function find(int $id): SupermarketCoupons
    {
        return SupermarketCoupons::query()->findOrFail($id);
    }

    public function update(int $id, array $data): SupermarketCoupons
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
