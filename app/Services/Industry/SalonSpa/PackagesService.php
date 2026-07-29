<?php

namespace App\Services\Industry\SalonSpa;

use App\Models\Industry\SalonSpaPackages;
use App\Services\BaseService;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class PackagesService extends BaseService
{
    public function list(array $filters = []): LengthAwarePaginator
    {
        $query = SalonSpaPackages::query()->latest();
        if (! empty($filters['search'])) {
            $query->where('name', 'like', '%'.$filters['search'].'%');
        }
        if (! empty($filters['status'])) {
            $query->where('status', $filters['status']);
        }
        $perPage = min((int) ($filters['per_page'] ?? 15), 100);

        return $query->paginate($perPage);
    }

    public function create(array $data): SalonSpaPackages
    {
        return SalonSpaPackages::query()->create($data);
    }

    public function find(int $id): SalonSpaPackages
    {
        return SalonSpaPackages::query()->findOrFail($id);
    }

    public function update(int $id, array $data): SalonSpaPackages
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
