<?php

namespace App\Backend\Modules\Industry\RestaurantHotels\Restaurant\Models;

use App\Backend\Models\BaseModel;

class IngredientsTrackingModel extends BaseModel
{
    protected string $table = 'restaurant_hotels_restaurant_ingredients_tracking';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
