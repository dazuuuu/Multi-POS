<?php

namespace App\Services\Industry\SalonSpa;

use App\Models\Industry\SalonSpaAppointments;
use App\Services\BaseService;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class AppointmentsService extends BaseService
{
    public function list(array $filters = []): LengthAwarePaginator
    {
        $query = SalonSpaAppointments::query()->latest();
        if (! empty($filters['search'])) {
            $query->where('name', 'like', '%'.$filters['search'].'%');
        }
        if (! empty($filters['status'])) {
            $query->where('status', $filters['status']);
        }
        $perPage = min((int) ($filters['per_page'] ?? 15), 100);

        return $query->paginate($perPage);
    }

    public function create(array $data): SalonSpaAppointments
    {
        return SalonSpaAppointments::query()->create($data);
    }

    public function find(int $id): SalonSpaAppointments
    {
        return SalonSpaAppointments::query()->findOrFail($id);
    }

    public function update(int $id, array $data): SalonSpaAppointments
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
