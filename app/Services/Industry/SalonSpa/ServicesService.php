<?php

namespace App\Services\Industry\SalonSpa;

use App\Models\Industry\SalonSpaServices;
use App\Services\BaseService;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class ServicesService extends BaseService
{
    public function list(array $filters = []): LengthAwarePaginator
    {
        $query = SalonSpaServices::query()->latest();
        if (! empty($filters['search'])) {
            $query->where('name', 'like', '%'.$filters['search'].'%');
        }
        if (! empty($filters['status'])) {
            $query->where('status', $filters['status']);
        }
        $perPage = min((int) ($filters['per_page'] ?? 15), 100);

        return $query->paginate($perPage);
    }

    public function create(array $data): SalonSpaServices
    {
        return SalonSpaServices::query()->create($data);
    }

    public function find(int $id): SalonSpaServices
    {
        return SalonSpaServices::query()->findOrFail($id);
    }

    public function update(int $id, array $data): SalonSpaServices
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
