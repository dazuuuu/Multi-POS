<?php

namespace App\Services\Industry\AgrovetHardware;

use App\Models\Industry\AgrovetHardwareContractorAccounts;
use App\Services\BaseService;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class ContractorAccountsService extends BaseService
{
    public function list(array $filters = []): LengthAwarePaginator
    {
        $query = AgrovetHardwareContractorAccounts::query()->latest();
        if (! empty($filters['search'])) {
            $query->where('name', 'like', '%'.$filters['search'].'%');
        }
        if (! empty($filters['status'])) {
            $query->where('status', $filters['status']);
        }
        $perPage = min((int) ($filters['per_page'] ?? 15), 100);

        return $query->paginate($perPage);
    }

    public function create(array $data): AgrovetHardwareContractorAccounts
    {
        return AgrovetHardwareContractorAccounts::query()->create($data);
    }

    public function find(int $id): AgrovetHardwareContractorAccounts
    {
        return AgrovetHardwareContractorAccounts::query()->findOrFail($id);
    }

    public function update(int $id, array $data): AgrovetHardwareContractorAccounts
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
