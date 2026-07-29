<?php

namespace App\Services\Industry\SalonSpa;

use App\Models\Industry\SalonSpaTreatmentRecords;
use App\Services\BaseService;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class TreatmentRecordsService extends BaseService
{
    public function list(array $filters = []): LengthAwarePaginator
    {
        $query = SalonSpaTreatmentRecords::query()->latest();
        if (! empty($filters['search'])) {
            $query->where('name', 'like', '%'.$filters['search'].'%');
        }
        if (! empty($filters['status'])) {
            $query->where('status', $filters['status']);
        }
        $perPage = min((int) ($filters['per_page'] ?? 15), 100);

        return $query->paginate($perPage);
    }

    public function create(array $data): SalonSpaTreatmentRecords
    {
        return SalonSpaTreatmentRecords::query()->create($data);
    }

    public function find(int $id): SalonSpaTreatmentRecords
    {
        return SalonSpaTreatmentRecords::query()->findOrFail($id);
    }

    public function update(int $id, array $data): SalonSpaTreatmentRecords
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
