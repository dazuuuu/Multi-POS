<?php

namespace App\Backend\Modules\Industry\RestaurantHotels\Restaurant\Models;

use App\Backend\Models\BaseModel;

class MenuCategoriesModel extends BaseModel
{
    protected string $table = 'restaurant_hotels_restaurant_menu_categories';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
