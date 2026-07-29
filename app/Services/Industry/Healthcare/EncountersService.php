<?php

namespace App\Services\Industry\Healthcare;

use App\Models\Industry\HealthcareEncounters;
use App\Services\BaseService;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class EncountersService extends BaseService
{
    public function list(array $filters = []): LengthAwarePaginator
    {
        $query = HealthcareEncounters::query()->latest();
        if (! empty($filters['search'])) {
            $query->where('name', 'like', '%'.$filters['search'].'%');
        }
        if (! empty($filters['status'])) {
            $query->where('status', $filters['status']);
        }
        $perPage = min((int) ($filters['per_page'] ?? 15), 100);

        return $query->paginate($perPage);
    }

    public function create(array $data): HealthcareEncounters
    {
        return HealthcareEncounters::query()->create($data);
    }

    public function find(int $id): HealthcareEncounters
    {
        return HealthcareEncounters::query()->findOrFail($id);
    }

    public function update(int $id, array $data): HealthcareEncounters
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
