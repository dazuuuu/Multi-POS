<?php

namespace App\Backend\Modules\Industry\RestaurantHotels;

class RestaurantHotelsModule
{
    public const MODULE_KEY = 'restaurant_hotels';

    public static function submodules(): array
    {
        return [
            'restaurant',
            'hotels',
        ];
    }

    public static function routes(): array
    {
        return array_merge(
            ...\Restaurant\RestaurantSubmodule::routes(),
            ...\Hotels\HotelsSubmodule::routes(),
        );
    }
}
