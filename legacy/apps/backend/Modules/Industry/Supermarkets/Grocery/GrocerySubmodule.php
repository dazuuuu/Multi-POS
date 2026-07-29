<?php

namespace App\Backend\Modules\Industry\Supermarkets\Grocery;

class GrocerySubmodule
{
    public const MODULE_KEY = 'supermarkets';
    public const SUBMODULE_KEY = 'grocery';

    public static function features(): array
    {
        return [            'barcode_scanning',
            'weighing_scale_integration',
            'fresh_produce',
            'expiry_management',
            'bogo_promotions',
            'shelf_labels',
        ];
    }

    public static function routes(): array
    {
        return [            'GET /api/modules/supermarkets/grocery/barcode_scanning' => [Controllers\BarcodeScanningController::class, 'index'],
            'POST /api/modules/supermarkets/grocery/barcode_scanning' => [Controllers\BarcodeScanningController::class, 'store'],
            'GET /api/modules/supermarkets/grocery/barcode_scanning/{id}' => [Controllers\BarcodeScanningController::class, 'show'],
            'PUT /api/modules/supermarkets/grocery/barcode_scanning/{id}' => [Controllers\BarcodeScanningController::class, 'update'],
            'DELETE /api/modules/supermarkets/grocery/barcode_scanning/{id}' => [Controllers\BarcodeScanningController::class, 'destroy'],
            'GET /api/modules/supermarkets/grocery/weighing_scale_integration' => [Controllers\WeighingScaleIntegrationController::class, 'index'],
            'POST /api/modules/supermarkets/grocery/weighing_scale_integration' => [Controllers\WeighingScaleIntegrationController::class, 'store'],
            'GET /api/modules/supermarkets/grocery/weighing_scale_integration/{id}' => [Controllers\WeighingScaleIntegrationController::class, 'show'],
            'PUT /api/modules/supermarkets/grocery/weighing_scale_integration/{id}' => [Controllers\WeighingScaleIntegrationController::class, 'update'],
            'DELETE /api/modules/supermarkets/grocery/weighing_scale_integration/{id}' => [Controllers\WeighingScaleIntegrationController::class, 'destroy'],
            'GET /api/modules/supermarkets/grocery/fresh_produce' => [Controllers\FreshProduceController::class, 'index'],
            'POST /api/modules/supermarkets/grocery/fresh_produce' => [Controllers\FreshProduceController::class, 'store'],
            'GET /api/modules/supermarkets/grocery/fresh_produce/{id}' => [Controllers\FreshProduceController::class, 'show'],
            'PUT /api/modules/supermarkets/grocery/fresh_produce/{id}' => [Controllers\FreshProduceController::class, 'update'],
            'DELETE /api/modules/supermarkets/grocery/fresh_produce/{id}' => [Controllers\FreshProduceController::class, 'destroy'],
            'GET /api/modules/supermarkets/grocery/expiry_management' => [Controllers\ExpiryManagementController::class, 'index'],
            'POST /api/modules/supermarkets/grocery/expiry_management' => [Controllers\ExpiryManagementController::class, 'store'],
            'GET /api/modules/supermarkets/grocery/expiry_management/{id}' => [Controllers\ExpiryManagementController::class, 'show'],
            'PUT /api/modules/supermarkets/grocery/expiry_management/{id}' => [Controllers\ExpiryManagementController::class, 'update'],
            'DELETE /api/modules/supermarkets/grocery/expiry_management/{id}' => [Controllers\ExpiryManagementController::class, 'destroy'],
            'GET /api/modules/supermarkets/grocery/bogo_promotions' => [Controllers\BogoPromotionsController::class, 'index'],
            'POST /api/modules/supermarkets/grocery/bogo_promotions' => [Controllers\BogoPromotionsController::class, 'store'],
            'GET /api/modules/supermarkets/grocery/bogo_promotions/{id}' => [Controllers\BogoPromotionsController::class, 'show'],
            'PUT /api/modules/supermarkets/grocery/bogo_promotions/{id}' => [Controllers\BogoPromotionsController::class, 'update'],
            'DELETE /api/modules/supermarkets/grocery/bogo_promotions/{id}' => [Controllers\BogoPromotionsController::class, 'destroy'],
            'GET /api/modules/supermarkets/grocery/shelf_labels' => [Controllers\ShelfLabelsController::class, 'index'],
            'POST /api/modules/supermarkets/grocery/shelf_labels' => [Controllers\ShelfLabelsController::class, 'store'],
            'GET /api/modules/supermarkets/grocery/shelf_labels/{id}' => [Controllers\ShelfLabelsController::class, 'show'],
            'PUT /api/modules/supermarkets/grocery/shelf_labels/{id}' => [Controllers\ShelfLabelsController::class, 'update'],
            'DELETE /api/modules/supermarkets/grocery/shelf_labels/{id}' => [Controllers\ShelfLabelsController::class, 'destroy'],
        ];
    }
}
