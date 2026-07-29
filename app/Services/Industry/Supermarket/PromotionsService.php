<?php

namespace App\Services\Industry\Supermarket;

use App\Models\Industry\SupermarketPromotions;
use App\Services\BaseService;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class PromotionsService extends BaseService
{
    public function list(array $filters = []): LengthAwarePaginator
    {
        $query = SupermarketPromotions::query()->latest();
        if (! empty($filters['search'])) {
            $query->where('name', 'like', '%'.$filters['search'].'%');
        }
        if (! empty($filters['status'])) {
            $query->where('status', $filters['status']);
        }
        $perPage = min((int) ($filters['per_page'] ?? 15), 100);

        return $query->paginate($perPage);
    }

    public function create(array $data): SupermarketPromotions
    {
        return SupermarketPromotions::query()->create($data);
    }

    public function find(int $id): SupermarketPromotions
    {
        return SupermarketPromotions::query()->findOrFail($id);
    }

    public function update(int $id, array $data): SupermarketPromotions
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
