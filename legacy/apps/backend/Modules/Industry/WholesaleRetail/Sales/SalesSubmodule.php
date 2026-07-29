<?php

namespace App\Backend\Modules\Industry\WholesaleRetail\Sales;

class SalesSubmodule
{
    public const MODULE_KEY = 'wholesale_retail';
    public const SUBMODULE_KEY = 'sales';

    public static function features(): array
    {
        return [            'bulk_pricing',
            'wholesale_pricing',
            'retail_pricing',
            'customer_specific_pricing',
            'quantity_discounts',
        ];
    }

    public static function routes(): array
    {
        return [            'GET /api/modules/wholesale_retail/sales/bulk_pricing' => [Controllers\BulkPricingController::class, 'index'],
            'POST /api/modules/wholesale_retail/sales/bulk_pricing' => [Controllers\BulkPricingController::class, 'store'],
            'GET /api/modules/wholesale_retail/sales/bulk_pricing/{id}' => [Controllers\BulkPricingController::class, 'show'],
            'PUT /api/modules/wholesale_retail/sales/bulk_pricing/{id}' => [Controllers\BulkPricingController::class, 'update'],
            'DELETE /api/modules/wholesale_retail/sales/bulk_pricing/{id}' => [Controllers\BulkPricingController::class, 'destroy'],
            'GET /api/modules/wholesale_retail/sales/wholesale_pricing' => [Controllers\WholesalePricingController::class, 'index'],
            'POST /api/modules/wholesale_retail/sales/wholesale_pricing' => [Controllers\WholesalePricingController::class, 'store'],
            'GET /api/modules/wholesale_retail/sales/wholesale_pricing/{id}' => [Controllers\WholesalePricingController::class, 'show'],
            'PUT /api/modules/wholesale_retail/sales/wholesale_pricing/{id}' => [Controllers\WholesalePricingController::class, 'update'],
            'DELETE /api/modules/wholesale_retail/sales/wholesale_pricing/{id}' => [Controllers\WholesalePricingController::class, 'destroy'],
            'GET /api/modules/wholesale_retail/sales/retail_pricing' => [Controllers\RetailPricingController::class, 'index'],
            'POST /api/modules/wholesale_retail/sales/retail_pricing' => [Controllers\RetailPricingController::class, 'store'],
            'GET /api/modules/wholesale_retail/sales/retail_pricing/{id}' => [Controllers\RetailPricingController::class, 'show'],
            'PUT /api/modules/wholesale_retail/sales/retail_pricing/{id}' => [Controllers\RetailPricingController::class, 'update'],
            'DELETE /api/modules/wholesale_retail/sales/retail_pricing/{id}' => [Controllers\RetailPricingController::class, 'destroy'],
            'GET /api/modules/wholesale_retail/sales/customer_specific_pricing' => [Controllers\CustomerSpecificPricingController::class, 'index'],
            'POST /api/modules/wholesale_retail/sales/customer_specific_pricing' => [Controllers\CustomerSpecificPricingController::class, 'store'],
            'GET /api/modules/wholesale_retail/sales/customer_specific_pricing/{id}' => [Controllers\CustomerSpecificPricingController::class, 'show'],
            'PUT /api/modules/wholesale_retail/sales/customer_specific_pricing/{id}' => [Controllers\CustomerSpecificPricingController::class, 'update'],
            'DELETE /api/modules/wholesale_retail/sales/customer_specific_pricing/{id}' => [Controllers\CustomerSpecificPricingController::class, 'destroy'],
            'GET /api/modules/wholesale_retail/sales/quantity_discounts' => [Controllers\QuantityDiscountsController::class, 'index'],
            'POST /api/modules/wholesale_retail/sales/quantity_discounts' => [Controllers\QuantityDiscountsController::class, 'store'],
            'GET /api/modules/wholesale_retail/sales/quantity_discounts/{id}' => [Controllers\QuantityDiscountsController::class, 'show'],
            'PUT /api/modules/wholesale_retail/sales/quantity_discounts/{id}' => [Controllers\QuantityDiscountsController::class, 'update'],
            'DELETE /api/modules/wholesale_retail/sales/quantity_discounts/{id}' => [Controllers\QuantityDiscountsController::class, 'destroy'],
        ];
    }
}
