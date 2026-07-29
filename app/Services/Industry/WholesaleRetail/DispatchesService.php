<?php

namespace App\Services\Industry\WholesaleRetail;

use App\Models\Industry\WholesaleRetailDispatches;
use App\Services\BaseService;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class DispatchesService extends BaseService
{
    public function list(array $filters = []): LengthAwarePaginator
    {
        $query = WholesaleRetailDispatches::query()->latest();
        if (! empty($filters['search'])) {
            $query->where('name', 'like', '%'.$filters['search'].'%');
        }
        if (! empty($filters['status'])) {
            $query->where('status', $filters['status']);
        }
        $perPage = min((int) ($filters['per_page'] ?? 15), 100);

        return $query->paginate($perPage);
    }

    public function create(array $data): WholesaleRetailDispatches
    {
        return WholesaleRetailDispatches::query()->create($data);
    }

    public function find(int $id): WholesaleRetailDispatches
    {
        return WholesaleRetailDispatches::query()->findOrFail($id);
    }

    public function update(int $id, array $data): WholesaleRetailDispatches
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
