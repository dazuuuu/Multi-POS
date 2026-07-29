<?php

namespace App\Services\Industry\BarLiquor;

use App\Models\Industry\BarLiquorBottles;
use App\Services\BaseService;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class BottlesService extends BaseService
{
    public function list(array $filters = []): LengthAwarePaginator
    {
        $query = BarLiquorBottles::query()->latest();
        if (! empty($filters['search'])) {
            $query->where('name', 'like', '%'.$filters['search'].'%');
        }
        if (! empty($filters['status'])) {
            $query->where('status', $filters['status']);
        }
        $perPage = min((int) ($filters['per_page'] ?? 15), 100);

        return $query->paginate($perPage);
    }

    public function create(array $data): BarLiquorBottles
    {
        return BarLiquorBottles::query()->create($data);
    }

    public function find(int $id): BarLiquorBottles
    {
        return BarLiquorBottles::query()->findOrFail($id);
    }

    public function update(int $id, array $data): BarLiquorBottles
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
