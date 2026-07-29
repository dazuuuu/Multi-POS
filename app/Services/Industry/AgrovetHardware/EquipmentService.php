<?php

namespace App\Services\Industry\AgrovetHardware;

use App\Models\Industry\AgrovetHardwareEquipment;
use App\Services\BaseService;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class EquipmentService extends BaseService
{
    public function list(array $filters = []): LengthAwarePaginator
    {
        $query = AgrovetHardwareEquipment::query()->latest();
        if (! empty($filters['search'])) {
            $query->where('name', 'like', '%'.$filters['search'].'%');
        }
        if (! empty($filters['status'])) {
            $query->where('status', $filters['status']);
        }
        $perPage = min((int) ($filters['per_page'] ?? 15), 100);

        return $query->paginate($perPage);
    }

    public function create(array $data): AgrovetHardwareEquipment
    {
        return AgrovetHardwareEquipment::query()->create($data);
    }

    public function find(int $id): AgrovetHardwareEquipment
    {
        return AgrovetHardwareEquipment::query()->findOrFail($id);
    }

    public function update(int $id, array $data): AgrovetHardwareEquipment
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
