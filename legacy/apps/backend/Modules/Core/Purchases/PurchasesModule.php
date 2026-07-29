<?php

namespace App\Backend\Modules\Core\Purchases;

class PurchasesModule
{
    public const MODULE_KEY = 'purchases';

    public static function features(): array
    {
        return [
            'suppliers',
            'purchase_orders',
            'goods_received',
            'supplier_invoices',
            'supplier_returns',
            'outstanding_balances',
            'payment_schedules',
        ];
    }

    public static function routes(): array
    {
        return [
            'GET /api/modules/purchases/suppliers' => [Controllers\SuppliersController::class, 'index'],
            'POST /api/modules/purchases/suppliers' => [Controllers\SuppliersController::class, 'store'],
            'GET /api/modules/purchases/suppliers/{id}' => [Controllers\SuppliersController::class, 'show'],
            'PUT /api/modules/purchases/suppliers/{id}' => [Controllers\SuppliersController::class, 'update'],
            'DELETE /api/modules/purchases/suppliers/{id}' => [Controllers\SuppliersController::class, 'destroy'],
            'GET /api/modules/purchases/purchase_orders' => [Controllers\PurchaseOrdersController::class, 'index'],
            'POST /api/modules/purchases/purchase_orders' => [Controllers\PurchaseOrdersController::class, 'store'],
            'GET /api/modules/purchases/purchase_orders/{id}' => [Controllers\PurchaseOrdersController::class, 'show'],
            'PUT /api/modules/purchases/purchase_orders/{id}' => [Controllers\PurchaseOrdersController::class, 'update'],
            'DELETE /api/modules/purchases/purchase_orders/{id}' => [Controllers\PurchaseOrdersController::class, 'destroy'],
            'GET /api/modules/purchases/goods_received' => [Controllers\GoodsReceivedController::class, 'index'],
            'POST /api/modules/purchases/goods_received' => [Controllers\GoodsReceivedController::class, 'store'],
            'GET /api/modules/purchases/goods_received/{id}' => [Controllers\GoodsReceivedController::class, 'show'],
            'PUT /api/modules/purchases/goods_received/{id}' => [Controllers\GoodsReceivedController::class, 'update'],
            'DELETE /api/modules/purchases/goods_received/{id}' => [Controllers\GoodsReceivedController::class, 'destroy'],
            'GET /api/modules/purchases/supplier_invoices' => [Controllers\SupplierInvoicesController::class, 'index'],
            'POST /api/modules/purchases/supplier_invoices' => [Controllers\SupplierInvoicesController::class, 'store'],
            'GET /api/modules/purchases/supplier_invoices/{id}' => [Controllers\SupplierInvoicesController::class, 'show'],
            'PUT /api/modules/purchases/supplier_invoices/{id}' => [Controllers\SupplierInvoicesController::class, 'update'],
            'DELETE /api/modules/purchases/supplier_invoices/{id}' => [Controllers\SupplierInvoicesController::class, 'destroy'],
            'GET /api/modules/purchases/supplier_returns' => [Controllers\SupplierReturnsController::class, 'index'],
            'POST /api/modules/purchases/supplier_returns' => [Controllers\SupplierReturnsController::class, 'store'],
            'GET /api/modules/purchases/supplier_returns/{id}' => [Controllers\SupplierReturnsController::class, 'show'],
            'PUT /api/modules/purchases/supplier_returns/{id}' => [Controllers\SupplierReturnsController::class, 'update'],
            'DELETE /api/modules/purchases/supplier_returns/{id}' => [Controllers\SupplierReturnsController::class, 'destroy'],
            'GET /api/modules/purchases/outstanding_balances' => [Controllers\OutstandingBalancesController::class, 'index'],
            'POST /api/modules/purchases/outstanding_balances' => [Controllers\OutstandingBalancesController::class, 'store'],
            'GET /api/modules/purchases/outstanding_balances/{id}' => [Controllers\OutstandingBalancesController::class, 'show'],
            'PUT /api/modules/purchases/outstanding_balances/{id}' => [Controllers\OutstandingBalancesController::class, 'update'],
            'DELETE /api/modules/purchases/outstanding_balances/{id}' => [Controllers\OutstandingBalancesController::class, 'destroy'],
            'GET /api/modules/purchases/payment_schedules' => [Controllers\PaymentSchedulesController::class, 'index'],
            'POST /api/modules/purchases/payment_schedules' => [Controllers\PaymentSchedulesController::class, 'store'],
            'GET /api/modules/purchases/payment_schedules/{id}' => [Controllers\PaymentSchedulesController::class, 'show'],
            'PUT /api/modules/purchases/payment_schedules/{id}' => [Controllers\PaymentSchedulesController::class, 'update'],
            'DELETE /api/modules/purchases/payment_schedules/{id}' => [Controllers\PaymentSchedulesController::class, 'destroy'],
        ];
    }
}
