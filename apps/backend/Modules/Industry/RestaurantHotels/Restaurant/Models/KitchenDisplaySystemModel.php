<?php

namespace App\Backend\Modules\Industry\RestaurantHotels\Restaurant\Models;

use App\Backend\Models\BaseModel;

class KitchenDisplaySystemModel extends BaseModel
{
    protected string $table = 'restaurant_hotels_restaurant_kitchen_display_system';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
