<?php

namespace App\Backend\Modules\Industry\RestaurantHotels\Restaurant\Models;

use App\Backend\Models\BaseModel;

class HappyHourPricingModel extends BaseModel
{
    protected string $table = 'restaurant_hotels_restaurant_happy_hour_pricing';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
