<?php

namespace App\Backend\Modules\Core\Reports;

class ReportsModule
{
    public const MODULE_KEY = 'reports';

    public static function features(): array
    {
        return [
            'sales_reports',
            'inventory_reports',
            'customer_reports',
            'supplier_reports',
            'financial_reports',
            'employee_reports',
            'branch_reports',
            'tax_reports',
            'product_movement',
            'commission_reports',
        ];
    }

    public static function routes(): array
    {
        return [
            'GET /api/modules/reports/sales_reports' => [Controllers\SalesReportsController::class, 'index'],
            'POST /api/modules/reports/sales_reports' => [Controllers\SalesReportsController::class, 'store'],
            'GET /api/modules/reports/sales_reports/{id}' => [Controllers\SalesReportsController::class, 'show'],
            'PUT /api/modules/reports/sales_reports/{id}' => [Controllers\SalesReportsController::class, 'update'],
            'DELETE /api/modules/reports/sales_reports/{id}' => [Controllers\SalesReportsController::class, 'destroy'],
            'GET /api/modules/reports/inventory_reports' => [Controllers\InventoryReportsController::class, 'index'],
            'POST /api/modules/reports/inventory_reports' => [Controllers\InventoryReportsController::class, 'store'],
            'GET /api/modules/reports/inventory_reports/{id}' => [Controllers\InventoryReportsController::class, 'show'],
            'PUT /api/modules/reports/inventory_reports/{id}' => [Controllers\InventoryReportsController::class, 'update'],
            'DELETE /api/modules/reports/inventory_reports/{id}' => [Controllers\InventoryReportsController::class, 'destroy'],
            'GET /api/modules/reports/customer_reports' => [Controllers\CustomerReportsController::class, 'index'],
            'POST /api/modules/reports/customer_reports' => [Controllers\CustomerReportsController::class, 'store'],
            'GET /api/modules/reports/customer_reports/{id}' => [Controllers\CustomerReportsController::class, 'show'],
            'PUT /api/modules/reports/customer_reports/{id}' => [Controllers\CustomerReportsController::class, 'update'],
            'DELETE /api/modules/reports/customer_reports/{id}' => [Controllers\CustomerReportsController::class, 'destroy'],
            'GET /api/modules/reports/supplier_reports' => [Controllers\SupplierReportsController::class, 'index'],
            'POST /api/modules/reports/supplier_reports' => [Controllers\SupplierReportsController::class, 'store'],
            'GET /api/modules/reports/supplier_reports/{id}' => [Controllers\SupplierReportsController::class, 'show'],
            'PUT /api/modules/reports/supplier_reports/{id}' => [Controllers\SupplierReportsController::class, 'update'],
            'DELETE /api/modules/reports/supplier_reports/{id}' => [Controllers\SupplierReportsController::class, 'destroy'],
            'GET /api/modules/reports/financial_reports' => [Controllers\FinancialReportsController::class, 'index'],
            'POST /api/modules/reports/financial_reports' => [Controllers\FinancialReportsController::class, 'store'],
            'GET /api/modules/reports/financial_reports/{id}' => [Controllers\FinancialReportsController::class, 'show'],
            'PUT /api/modules/reports/financial_reports/{id}' => [Controllers\FinancialReportsController::class, 'update'],
            'DELETE /api/modules/reports/financial_reports/{id}' => [Controllers\FinancialReportsController::class, 'destroy'],
            'GET /api/modules/reports/employee_reports' => [Controllers\EmployeeReportsController::class, 'index'],
            'POST /api/modules/reports/employee_reports' => [Controllers\EmployeeReportsController::class, 'store'],
            'GET /api/modules/reports/employee_reports/{id}' => [Controllers\EmployeeReportsController::class, 'show'],
            'PUT /api/modules/reports/employee_reports/{id}' => [Controllers\EmployeeReportsController::class, 'update'],
            'DELETE /api/modules/reports/employee_reports/{id}' => [Controllers\EmployeeReportsController::class, 'destroy'],
            'GET /api/modules/reports/branch_reports' => [Controllers\BranchReportsController::class, 'index'],
            'POST /api/modules/reports/branch_reports' => [Controllers\BranchReportsController::class, 'store'],
            'GET /api/modules/reports/branch_reports/{id}' => [Controllers\BranchReportsController::class, 'show'],
            'PUT /api/modules/reports/branch_reports/{id}' => [Controllers\BranchReportsController::class, 'update'],
            'DELETE /api/modules/reports/branch_reports/{id}' => [Controllers\BranchReportsController::class, 'destroy'],
            'GET /api/modules/reports/tax_reports' => [Controllers\TaxReportsController::class, 'index'],
            'POST /api/modules/reports/tax_reports' => [Controllers\TaxReportsController::class, 'store'],
            'GET /api/modules/reports/tax_reports/{id}' => [Controllers\TaxReportsController::class, 'show'],
            'PUT /api/modules/reports/tax_reports/{id}' => [Controllers\TaxReportsController::class, 'update'],
            'DELETE /api/modules/reports/tax_reports/{id}' => [Controllers\TaxReportsController::class, 'destroy'],
            'GET /api/modules/reports/product_movement' => [Controllers\ProductMovementController::class, 'index'],
            'POST /api/modules/reports/product_movement' => [Controllers\ProductMovementController::class, 'store'],
            'GET /api/modules/reports/product_movement/{id}' => [Controllers\ProductMovementController::class, 'show'],
            'PUT /api/modules/reports/product_movement/{id}' => [Controllers\ProductMovementController::class, 'update'],
            'DELETE /api/modules/reports/product_movement/{id}' => [Controllers\ProductMovementController::class, 'destroy'],
            'GET /api/modules/reports/commission_reports' => [Controllers\CommissionReportsController::class, 'index'],
            'POST /api/modules/reports/commission_reports' => [Controllers\CommissionReportsController::class, 'store'],
            'GET /api/modules/reports/commission_reports/{id}' => [Controllers\CommissionReportsController::class, 'show'],
            'PUT /api/modules/reports/commission_reports/{id}' => [Controllers\CommissionReportsController::class, 'update'],
            'DELETE /api/modules/reports/commission_reports/{id}' => [Controllers\CommissionReportsController::class, 'destroy'],
        ];
    }
}
