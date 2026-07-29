<?php

namespace App\Services\Industry\Healthcare;

use App\Models\Industry\HealthcareAppointments;
use App\Services\BaseService;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class AppointmentsService extends BaseService
{
    public function list(array $filters = []): LengthAwarePaginator
    {
        $query = HealthcareAppointments::query()->latest();
        if (! empty($filters['search'])) {
            $query->where('name', 'like', '%'.$filters['search'].'%');
        }
        if (! empty($filters['status'])) {
            $query->where('status', $filters['status']);
        }
        $perPage = min((int) ($filters['per_page'] ?? 15), 100);

        return $query->paginate($perPage);
    }

    public function create(array $data): HealthcareAppointments
    {
        return HealthcareAppointments::query()->create($data);
    }

    public function find(int $id): HealthcareAppointments
    {
        return HealthcareAppointments::query()->findOrFail($id);
    }

    public function update(int $id, array $data): HealthcareAppointments
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
