<?php

namespace App\Services\Industry\RestaurantHotel;

use App\Models\Industry\RestaurantHotelGuests;
use App\Services\BaseService;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class GuestsService extends BaseService
{
    public function list(array $filters = []): LengthAwarePaginator
    {
        $query = RestaurantHotelGuests::query()->latest();
        if (! empty($filters['search'])) {
            $query->where('name', 'like', '%'.$filters['search'].'%');
        }
        if (! empty($filters['status'])) {
            $query->where('status', $filters['status']);
        }
        $perPage = min((int) ($filters['per_page'] ?? 15), 100);

        return $query->paginate($perPage);
    }

    public function create(array $data): RestaurantHotelGuests
    {
        return RestaurantHotelGuests::query()->create($data);
    }

    public function find(int $id): RestaurantHotelGuests
    {
        return RestaurantHotelGuests::query()->findOrFail($id);
    }

    public function update(int $id, array $data): RestaurantHotelGuests
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
