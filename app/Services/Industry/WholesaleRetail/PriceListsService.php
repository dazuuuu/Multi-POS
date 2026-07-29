<?php

namespace App\Services\Industry\WholesaleRetail;

use App\Models\Industry\WholesaleRetailPriceLists;
use App\Services\BaseService;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class PriceListsService extends BaseService
{
    public function list(array $filters = []): LengthAwarePaginator
    {
        $query = WholesaleRetailPriceLists::query()->latest();
        if (! empty($filters['search'])) {
            $query->where('name', 'like', '%'.$filters['search'].'%');
        }
        if (! empty($filters['status'])) {
            $query->where('status', $filters['status']);
        }
        $perPage = min((int) ($filters['per_page'] ?? 15), 100);

        return $query->paginate($perPage);
    }

    public function create(array $data): WholesaleRetailPriceLists
    {
        return WholesaleRetailPriceLists::query()->create($data);
    }

    public function find(int $id): WholesaleRetailPriceLists
    {
        return WholesaleRetailPriceLists::query()->findOrFail($id);
    }

    public function update(int $id, array $data): WholesaleRetailPriceLists
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
