<?php

namespace App\Backend\Modules\Industry\RestaurantHotels\Restaurant\Models;

use App\Backend\Models\BaseModel;

class KitchenPrintingModel extends BaseModel
{
    protected string $table = 'restaurant_hotels_restaurant_kitchen_printing';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
