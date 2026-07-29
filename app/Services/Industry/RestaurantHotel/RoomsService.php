<?php

namespace App\Services\Industry\RestaurantHotel;

use App\Models\Industry\RestaurantHotelRooms;
use App\Services\BaseService;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class RoomsService extends BaseService
{
    public function list(array $filters = []): LengthAwarePaginator
    {
        $query = RestaurantHotelRooms::query()->latest();
        if (! empty($filters['search'])) {
            $query->where('name', 'like', '%'.$filters['search'].'%');
        }
        if (! empty($filters['status'])) {
            $query->where('status', $filters['status']);
        }
        $perPage = min((int) ($filters['per_page'] ?? 15), 100);

        return $query->paginate($perPage);
    }

    public function create(array $data): RestaurantHotelRooms
    {
        return RestaurantHotelRooms::query()->create($data);
    }

    public function find(int $id): RestaurantHotelRooms
    {
        return RestaurantHotelRooms::query()->findOrFail($id);
    }

    public function update(int $id, array $data): RestaurantHotelRooms
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
