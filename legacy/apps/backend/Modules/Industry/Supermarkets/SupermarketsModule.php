<?php

namespace App\Backend\Modules\Industry\Supermarkets;

class SupermarketsModule
{
    public const MODULE_KEY = 'supermarkets';

    public static function submodules(): array
    {
        return [
            'grocery',
            'checkout',
            'loyalty',
        ];
    }

    public static function routes(): array
    {
        return array_merge(
            ...\Grocery\GrocerySubmodule::routes(),
            ...\Checkout\CheckoutSubmodule::routes(),
            ...\Loyalty\LoyaltySubmodule::routes(),
        );
    }
}
