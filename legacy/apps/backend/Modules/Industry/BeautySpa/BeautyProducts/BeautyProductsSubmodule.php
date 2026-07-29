<?php

namespace App\Backend\Modules\Industry\BeautySpa\BeautyProducts;

class BeautyProductsSubmodule
{
    public const MODULE_KEY = 'beauty_spa';
    public const SUBMODULE_KEY = 'beauty_products';

    public static function features(): array
    {
        return [            'retail_cosmetics',
            'hair_products',
            'beauty_inventory',
        ];
    }

    public static function routes(): array
    {
        return [            'GET /api/modules/beauty_spa/beauty_products/retail_cosmetics' => [Controllers\RetailCosmeticsController::class, 'index'],
            'POST /api/modules/beauty_spa/beauty_products/retail_cosmetics' => [Controllers\RetailCosmeticsController::class, 'store'],
            'GET /api/modules/beauty_spa/beauty_products/retail_cosmetics/{id}' => [Controllers\RetailCosmeticsController::class, 'show'],
            'PUT /api/modules/beauty_spa/beauty_products/retail_cosmetics/{id}' => [Controllers\RetailCosmeticsController::class, 'update'],
            'DELETE /api/modules/beauty_spa/beauty_products/retail_cosmetics/{id}' => [Controllers\RetailCosmeticsController::class, 'destroy'],
            'GET /api/modules/beauty_spa/beauty_products/hair_products' => [Controllers\HairProductsController::class, 'index'],
            'POST /api/modules/beauty_spa/beauty_products/hair_products' => [Controllers\HairProductsController::class, 'store'],
            'GET /api/modules/beauty_spa/beauty_products/hair_products/{id}' => [Controllers\HairProductsController::class, 'show'],
            'PUT /api/modules/beauty_spa/beauty_products/hair_products/{id}' => [Controllers\HairProductsController::class, 'update'],
            'DELETE /api/modules/beauty_spa/beauty_products/hair_products/{id}' => [Controllers\HairProductsController::class, 'destroy'],
            'GET /api/modules/beauty_spa/beauty_products/beauty_inventory' => [Controllers\BeautyInventoryController::class, 'index'],
            'POST /api/modules/beauty_spa/beauty_products/beauty_inventory' => [Controllers\BeautyInventoryController::class, 'store'],
            'GET /api/modules/beauty_spa/beauty_products/beauty_inventory/{id}' => [Controllers\BeautyInventoryController::class, 'show'],
            'PUT /api/modules/beauty_spa/beauty_products/beauty_inventory/{id}' => [Controllers\BeautyInventoryController::class, 'update'],
            'DELETE /api/modules/beauty_spa/beauty_products/beauty_inventory/{id}' => [Controllers\BeautyInventoryController::class, 'destroy'],
        ];
    }
}
