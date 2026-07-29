<?php

namespace App\Backend\Modules\Industry\BarLiquor;

class BarLiquorModule
{
    public const MODULE_KEY = 'bar_liquor';

    public static function submodules(): array
    {
        return [
            'bar_operations',
            'liquor_store',
            'night_reports',
        ];
    }

    public static function routes(): array
    {
        return array_merge(
            ...\BarOperations\BarOperationsSubmodule::routes(),
            ...\LiquorStore\LiquorStoreSubmodule::routes(),
            ...\NightReports\NightReportsSubmodule::routes(),
        );
    }
}
