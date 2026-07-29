<?php

namespace App\Backend\Modules\Industry\RestaurantHotels\Hotels\Models;

use App\Backend\Models\BaseModel;

class ReservationsModel extends BaseModel
{
    protected string $table = 'restaurant_hotels_hotels_reservations';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
