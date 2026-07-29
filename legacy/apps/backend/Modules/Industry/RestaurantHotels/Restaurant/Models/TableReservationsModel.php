<?php

namespace App\Backend\Modules\Industry\RestaurantHotels\Restaurant\Models;

use App\Backend\Models\BaseModel;

class TableReservationsModel extends BaseModel
{
    protected string $table = 'restaurant_hotels_restaurant_table_reservations';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
