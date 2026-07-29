<?php

namespace App\Services\Industry\Supermarket;

use App\Models\Industry\SupermarketLoyaltyAccounts;
use App\Services\BaseService;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class LoyaltyAccountsService extends BaseService
{
    public function list(array $filters = []): LengthAwarePaginator
    {
        $query = SupermarketLoyaltyAccounts::query()->latest();
        if (! empty($filters['search'])) {
            $query->where('name', 'like', '%'.$filters['search'].'%');
        }
        if (! empty($filters['status'])) {
            $query->where('status', $filters['status']);
        }
        $perPage = min((int) ($filters['per_page'] ?? 15), 100);

        return $query->paginate($perPage);
    }

    public function create(array $data): SupermarketLoyaltyAccounts
    {
        return SupermarketLoyaltyAccounts::query()->create($data);
    }

    public function find(int $id): SupermarketLoyaltyAccounts
    {
        return SupermarketLoyaltyAccounts::query()->findOrFail($id);
    }

    public function update(int $id, array $data): SupermarketLoyaltyAccounts
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
