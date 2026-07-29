<?php

namespace App\Services\Industry\Supermarket;

use App\Models\Industry\SupermarketCashierSessions;
use App\Services\BaseService;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class CashierSessionsService extends BaseService
{
    public function list(array $filters = []): LengthAwarePaginator
    {
        $query = SupermarketCashierSessions::query()->latest();
        if (! empty($filters['search'])) {
            $query->where('name', 'like', '%'.$filters['search'].'%');
        }
        if (! empty($filters['status'])) {
            $query->where('status', $filters['status']);
        }
        $perPage = min((int) ($filters['per_page'] ?? 15), 100);

        return $query->paginate($perPage);
    }

    public function create(array $data): SupermarketCashierSessions
    {
        return SupermarketCashierSessions::query()->create($data);
    }

    public function find(int $id): SupermarketCashierSessions
    {
        return SupermarketCashierSessions::query()->findOrFail($id);
    }

    public function update(int $id, array $data): SupermarketCashierSessions
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
