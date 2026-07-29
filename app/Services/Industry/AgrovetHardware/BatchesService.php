<?php

namespace App\Services\Industry\AgrovetHardware;

use App\Models\Industry\AgrovetHardwareBatches;
use App\Services\BaseService;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class BatchesService extends BaseService
{
    public function list(array $filters = []): LengthAwarePaginator
    {
        $query = AgrovetHardwareBatches::query()->latest();
        if (! empty($filters['search'])) {
            $query->where('name', 'like', '%'.$filters['search'].'%');
        }
        if (! empty($filters['status'])) {
            $query->where('status', $filters['status']);
        }
        $perPage = min((int) ($filters['per_page'] ?? 15), 100);

        return $query->paginate($perPage);
    }

    public function create(array $data): AgrovetHardwareBatches
    {
        return AgrovetHardwareBatches::query()->create($data);
    }

    public function find(int $id): AgrovetHardwareBatches
    {
        return AgrovetHardwareBatches::query()->findOrFail($id);
    }

    public function update(int $id, array $data): AgrovetHardwareBatches
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
