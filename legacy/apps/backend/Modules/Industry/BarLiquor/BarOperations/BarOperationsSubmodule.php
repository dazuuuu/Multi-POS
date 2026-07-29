<?php

namespace App\Backend\Modules\Industry\BarLiquor\BarOperations;

class BarOperationsSubmodule
{
    public const MODULE_KEY = 'bar_liquor';
    public const SUBMODULE_KEY = 'bar_operations';

    public static function features(): array
    {
        return [            'bottle_tracking',
            'peg_measurements',
            'happy_hour_pricing',
            'cocktail_recipes',
            'mix_tracking',
            'open_tab_management',
            'table_service',
        ];
    }

    public static function routes(): array
    {
        return [            'GET /api/modules/bar_liquor/bar_operations/bottle_tracking' => [Controllers\BottleTrackingController::class, 'index'],
            'POST /api/modules/bar_liquor/bar_operations/bottle_tracking' => [Controllers\BottleTrackingController::class, 'store'],
            'GET /api/modules/bar_liquor/bar_operations/bottle_tracking/{id}' => [Controllers\BottleTrackingController::class, 'show'],
            'PUT /api/modules/bar_liquor/bar_operations/bottle_tracking/{id}' => [Controllers\BottleTrackingController::class, 'update'],
            'DELETE /api/modules/bar_liquor/bar_operations/bottle_tracking/{id}' => [Controllers\BottleTrackingController::class, 'destroy'],
            'GET /api/modules/bar_liquor/bar_operations/peg_measurements' => [Controllers\PegMeasurementsController::class, 'index'],
            'POST /api/modules/bar_liquor/bar_operations/peg_measurements' => [Controllers\PegMeasurementsController::class, 'store'],
            'GET /api/modules/bar_liquor/bar_operations/peg_measurements/{id}' => [Controllers\PegMeasurementsController::class, 'show'],
            'PUT /api/modules/bar_liquor/bar_operations/peg_measurements/{id}' => [Controllers\PegMeasurementsController::class, 'update'],
            'DELETE /api/modules/bar_liquor/bar_operations/peg_measurements/{id}' => [Controllers\PegMeasurementsController::class, 'destroy'],
            'GET /api/modules/bar_liquor/bar_operations/happy_hour_pricing' => [Controllers\HappyHourPricingController::class, 'index'],
            'POST /api/modules/bar_liquor/bar_operations/happy_hour_pricing' => [Controllers\HappyHourPricingController::class, 'store'],
            'GET /api/modules/bar_liquor/bar_operations/happy_hour_pricing/{id}' => [Controllers\HappyHourPricingController::class, 'show'],
            'PUT /api/modules/bar_liquor/bar_operations/happy_hour_pricing/{id}' => [Controllers\HappyHourPricingController::class, 'update'],
            'DELETE /api/modules/bar_liquor/bar_operations/happy_hour_pricing/{id}' => [Controllers\HappyHourPricingController::class, 'destroy'],
            'GET /api/modules/bar_liquor/bar_operations/cocktail_recipes' => [Controllers\CocktailRecipesController::class, 'index'],
            'POST /api/modules/bar_liquor/bar_operations/cocktail_recipes' => [Controllers\CocktailRecipesController::class, 'store'],
            'GET /api/modules/bar_liquor/bar_operations/cocktail_recipes/{id}' => [Controllers\CocktailRecipesController::class, 'show'],
            'PUT /api/modules/bar_liquor/bar_operations/cocktail_recipes/{id}' => [Controllers\CocktailRecipesController::class, 'update'],
            'DELETE /api/modules/bar_liquor/bar_operations/cocktail_recipes/{id}' => [Controllers\CocktailRecipesController::class, 'destroy'],
            'GET /api/modules/bar_liquor/bar_operations/mix_tracking' => [Controllers\MixTrackingController::class, 'index'],
            'POST /api/modules/bar_liquor/bar_operations/mix_tracking' => [Controllers\MixTrackingController::class, 'store'],
            'GET /api/modules/bar_liquor/bar_operations/mix_tracking/{id}' => [Controllers\MixTrackingController::class, 'show'],
            'PUT /api/modules/bar_liquor/bar_operations/mix_tracking/{id}' => [Controllers\MixTrackingController::class, 'update'],
            'DELETE /api/modules/bar_liquor/bar_operations/mix_tracking/{id}' => [Controllers\MixTrackingController::class, 'destroy'],
            'GET /api/modules/bar_liquor/bar_operations/open_tab_management' => [Controllers\OpenTabManagementController::class, 'index'],
            'POST /api/modules/bar_liquor/bar_operations/open_tab_management' => [Controllers\OpenTabManagementController::class, 'store'],
            'GET /api/modules/bar_liquor/bar_operations/open_tab_management/{id}' => [Controllers\OpenTabManagementController::class, 'show'],
            'PUT /api/modules/bar_liquor/bar_operations/open_tab_management/{id}' => [Controllers\OpenTabManagementController::class, 'update'],
            'DELETE /api/modules/bar_liquor/bar_operations/open_tab_management/{id}' => [Controllers\OpenTabManagementController::class, 'destroy'],
            'GET /api/modules/bar_liquor/bar_operations/table_service' => [Controllers\TableServiceController::class, 'index'],
            'POST /api/modules/bar_liquor/bar_operations/table_service' => [Controllers\TableServiceController::class, 'store'],
            'GET /api/modules/bar_liquor/bar_operations/table_service/{id}' => [Controllers\TableServiceController::class, 'show'],
            'PUT /api/modules/bar_liquor/bar_operations/table_service/{id}' => [Controllers\TableServiceController::class, 'update'],
            'DELETE /api/modules/bar_liquor/bar_operations/table_service/{id}' => [Controllers\TableServiceController::class, 'destroy'],
        ];
    }
}
