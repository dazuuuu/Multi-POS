<?php

namespace App\Backend\Modules\Industry\WholesaleRetail\Orders;

class OrdersSubmodule
{
    public const MODULE_KEY = 'wholesale_retail';
    public const SUBMODULE_KEY = 'orders';

    public static function features(): array
    {
        return [            'sales_orders',
            'purchase_orders',
            'quotations',
            'delivery_notes',
        ];
    }

    public static function routes(): array
    {
        return [            'GET /api/modules/wholesale_retail/orders/sales_orders' => [Controllers\SalesOrdersController::class, 'index'],
            'POST /api/modules/wholesale_retail/orders/sales_orders' => [Controllers\SalesOrdersController::class, 'store'],
            'GET /api/modules/wholesale_retail/orders/sales_orders/{id}' => [Controllers\SalesOrdersController::class, 'show'],
            'PUT /api/modules/wholesale_retail/orders/sales_orders/{id}' => [Controllers\SalesOrdersController::class, 'update'],
            'DELETE /api/modules/wholesale_retail/orders/sales_orders/{id}' => [Controllers\SalesOrdersController::class, 'destroy'],
            'GET /api/modules/wholesale_retail/orders/purchase_orders' => [Controllers\PurchaseOrdersController::class, 'index'],
            'POST /api/modules/wholesale_retail/orders/purchase_orders' => [Controllers\PurchaseOrdersController::class, 'store'],
            'GET /api/modules/wholesale_retail/orders/purchase_orders/{id}' => [Controllers\PurchaseOrdersController::class, 'show'],
            'PUT /api/modules/wholesale_retail/orders/purchase_orders/{id}' => [Controllers\PurchaseOrdersController::class, 'update'],
            'DELETE /api/modules/wholesale_retail/orders/purchase_orders/{id}' => [Controllers\PurchaseOrdersController::class, 'destroy'],
            'GET /api/modules/wholesale_retail/orders/quotations' => [Controllers\QuotationsController::class, 'index'],
            'POST /api/modules/wholesale_retail/orders/quotations' => [Controllers\QuotationsController::class, 'store'],
            'GET /api/modules/wholesale_retail/orders/quotations/{id}' => [Controllers\QuotationsController::class, 'show'],
            'PUT /api/modules/wholesale_retail/orders/quotations/{id}' => [Controllers\QuotationsController::class, 'update'],
            'DELETE /api/modules/wholesale_retail/orders/quotations/{id}' => [Controllers\QuotationsController::class, 'destroy'],
            'GET /api/modules/wholesale_retail/orders/delivery_notes' => [Controllers\DeliveryNotesController::class, 'index'],
            'POST /api/modules/wholesale_retail/orders/delivery_notes' => [Controllers\DeliveryNotesController::class, 'store'],
            'GET /api/modules/wholesale_retail/orders/delivery_notes/{id}' => [Controllers\DeliveryNotesController::class, 'show'],
            'PUT /api/modules/wholesale_retail/orders/delivery_notes/{id}' => [Controllers\DeliveryNotesController::class, 'update'],
            'DELETE /api/modules/wholesale_retail/orders/delivery_notes/{id}' => [Controllers\DeliveryNotesController::class, 'destroy'],
        ];
    }
}
