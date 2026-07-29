<?php

namespace App\Services\Industry\Healthcare;

use App\Models\Industry\HealthcarePatients;
use App\Services\BaseService;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class PatientsService extends BaseService
{
    public function list(array $filters = []): LengthAwarePaginator
    {
        $query = HealthcarePatients::query()->latest();
        if (! empty($filters['search'])) {
            $query->where('name', 'like', '%'.$filters['search'].'%');
        }
        if (! empty($filters['status'])) {
            $query->where('status', $filters['status']);
        }
        $perPage = min((int) ($filters['per_page'] ?? 15), 100);

        return $query->paginate($perPage);
    }

    public function create(array $data): HealthcarePatients
    {
        return HealthcarePatients::query()->create($data);
    }

    public function find(int $id): HealthcarePatients
    {
        return HealthcarePatients::query()->findOrFail($id);
    }

    public function update(int $id, array $data): HealthcarePatients
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
