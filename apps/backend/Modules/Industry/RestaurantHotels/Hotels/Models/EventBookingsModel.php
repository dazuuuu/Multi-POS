<?php

namespace App\Backend\Modules\Industry\RestaurantHotels\Hotels\Models;

use App\Backend\Models\BaseModel;

class EventBookingsModel extends BaseModel
{
    protected string $table = 'restaurant_hotels_hotels_event_bookings';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
