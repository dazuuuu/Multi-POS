<?php

namespace App\Services\Industry\BarLiquor;

use App\Models\Industry\BarLiquorShifts;
use App\Services\BaseService;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class ShiftsService extends BaseService
{
    public function list(array $filters = []): LengthAwarePaginator
    {
        $query = BarLiquorShifts::query()->latest();
        if (! empty($filters['search'])) {
            $query->where('name', 'like', '%'.$filters['search'].'%');
        }
        if (! empty($filters['status'])) {
            $query->where('status', $filters['status']);
        }
        $perPage = min((int) ($filters['per_page'] ?? 15), 100);

        return $query->paginate($perPage);
    }

    public function create(array $data): BarLiquorShifts
    {
        return BarLiquorShifts::query()->create($data);
    }

    public function find(int $id): BarLiquorShifts
    {
        return BarLiquorShifts::query()->findOrFail($id);
    }

    public function update(int $id, array $data): BarLiquorShifts
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
