<?php

namespace App\Backend\Modules\Industry\WholesaleRetail;

class WholesaleRetailModule
{
    public const MODULE_KEY = 'wholesale_retail';

    public static function submodules(): array
    {
        return [
            'sales',
            'orders',
            'logistics',
            'credit',
        ];
    }

    public static function routes(): array
    {
        return array_merge(
            ...\Sales\SalesSubmodule::routes(),
            ...\Orders\OrdersSubmodule::routes(),
            ...\Logistics\LogisticsSubmodule::routes(),
            ...\Credit\CreditSubmodule::routes(),
        );
    }
}
