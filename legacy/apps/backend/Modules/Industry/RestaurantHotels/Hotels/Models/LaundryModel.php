<?php

namespace App\Backend\Modules\Industry\RestaurantHotels\Hotels\Models;

use App\Backend\Models\BaseModel;

class LaundryModel extends BaseModel
{
    protected string $table = 'restaurant_hotels_hotels_laundry';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
