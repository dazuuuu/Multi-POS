<?php

namespace App\Services\Industry\Healthcare;

use App\Models\Industry\HealthcareLabOrders;
use App\Services\BaseService;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class LabOrdersService extends BaseService
{
    public function list(array $filters = []): LengthAwarePaginator
    {
        $query = HealthcareLabOrders::query()->latest();
        if (! empty($filters['search'])) {
            $query->where('name', 'like', '%'.$filters['search'].'%');
        }
        if (! empty($filters['status'])) {
            $query->where('status', $filters['status']);
        }
        $perPage = min((int) ($filters['per_page'] ?? 15), 100);

        return $query->paginate($perPage);
    }

    public function create(array $data): HealthcareLabOrders
    {
        return HealthcareLabOrders::query()->create($data);
    }

    public function find(int $id): HealthcareLabOrders
    {
        return HealthcareLabOrders::query()->findOrFail($id);
    }

    public function update(int $id, array $data): HealthcareLabOrders
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
