<?php

namespace App\Backend\Modules\Core\Suppliers;

class SuppliersModule
{
    public const MODULE_KEY = 'suppliers';

    public static function features(): array
    {
        return [
            'supplier_directory',
            'purchase_history',
            'payments',
            'outstanding_balances',
            'contact_management',
        ];
    }

    public static function routes(): array
    {
        return [
            'GET /api/modules/suppliers/supplier_directory' => [Controllers\SupplierDirectoryController::class, 'index'],
            'POST /api/modules/suppliers/supplier_directory' => [Controllers\SupplierDirectoryController::class, 'store'],
            'GET /api/modules/suppliers/supplier_directory/{id}' => [Controllers\SupplierDirectoryController::class, 'show'],
            'PUT /api/modules/suppliers/supplier_directory/{id}' => [Controllers\SupplierDirectoryController::class, 'update'],
            'DELETE /api/modules/suppliers/supplier_directory/{id}' => [Controllers\SupplierDirectoryController::class, 'destroy'],
            'GET /api/modules/suppliers/purchase_history' => [Controllers\PurchaseHistoryController::class, 'index'],
            'POST /api/modules/suppliers/purchase_history' => [Controllers\PurchaseHistoryController::class, 'store'],
            'GET /api/modules/suppliers/purchase_history/{id}' => [Controllers\PurchaseHistoryController::class, 'show'],
            'PUT /api/modules/suppliers/purchase_history/{id}' => [Controllers\PurchaseHistoryController::class, 'update'],
            'DELETE /api/modules/suppliers/purchase_history/{id}' => [Controllers\PurchaseHistoryController::class, 'destroy'],
            'GET /api/modules/suppliers/payments' => [Controllers\PaymentsController::class, 'index'],
            'POST /api/modules/suppliers/payments' => [Controllers\PaymentsController::class, 'store'],
            'GET /api/modules/suppliers/payments/{id}' => [Controllers\PaymentsController::class, 'show'],
            'PUT /api/modules/suppliers/payments/{id}' => [Controllers\PaymentsController::class, 'update'],
            'DELETE /api/modules/suppliers/payments/{id}' => [Controllers\PaymentsController::class, 'destroy'],
            'GET /api/modules/suppliers/outstanding_balances' => [Controllers\OutstandingBalancesController::class, 'index'],
            'POST /api/modules/suppliers/outstanding_balances' => [Controllers\OutstandingBalancesController::class, 'store'],
            'GET /api/modules/suppliers/outstanding_balances/{id}' => [Controllers\OutstandingBalancesController::class, 'show'],
            'PUT /api/modules/suppliers/outstanding_balances/{id}' => [Controllers\OutstandingBalancesController::class, 'update'],
            'DELETE /api/modules/suppliers/outstanding_balances/{id}' => [Controllers\OutstandingBalancesController::class, 'destroy'],
            'GET /api/modules/suppliers/contact_management' => [Controllers\ContactManagementController::class, 'index'],
            'POST /api/modules/suppliers/contact_management' => [Controllers\ContactManagementController::class, 'store'],
            'GET /api/modules/suppliers/contact_management/{id}' => [Controllers\ContactManagementController::class, 'show'],
            'PUT /api/modules/suppliers/contact_management/{id}' => [Controllers\ContactManagementController::class, 'update'],
            'DELETE /api/modules/suppliers/contact_management/{id}' => [Controllers\ContactManagementController::class, 'destroy'],
        ];
    }
}
