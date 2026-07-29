<?php

namespace App\Backend\Modules\Industry\BarLiquor\NightReports;

class NightReportsSubmodule
{
    public const MODULE_KEY = 'bar_liquor';
    public const SUBMODULE_KEY = 'night_reports';

    public static function features(): array
    {
        return [            'bartender_sales',
            'shift_closing',
            'cash_reconciliation',
        ];
    }

    public static function routes(): array
    {
        return [            'GET /api/modules/bar_liquor/night_reports/bartender_sales' => [Controllers\BartenderSalesController::class, 'index'],
            'POST /api/modules/bar_liquor/night_reports/bartender_sales' => [Controllers\BartenderSalesController::class, 'store'],
            'GET /api/modules/bar_liquor/night_reports/bartender_sales/{id}' => [Controllers\BartenderSalesController::class, 'show'],
            'PUT /api/modules/bar_liquor/night_reports/bartender_sales/{id}' => [Controllers\BartenderSalesController::class, 'update'],
            'DELETE /api/modules/bar_liquor/night_reports/bartender_sales/{id}' => [Controllers\BartenderSalesController::class, 'destroy'],
            'GET /api/modules/bar_liquor/night_reports/shift_closing' => [Controllers\ShiftClosingController::class, 'index'],
            'POST /api/modules/bar_liquor/night_reports/shift_closing' => [Controllers\ShiftClosingController::class, 'store'],
            'GET /api/modules/bar_liquor/night_reports/shift_closing/{id}' => [Controllers\ShiftClosingController::class, 'show'],
            'PUT /api/modules/bar_liquor/night_reports/shift_closing/{id}' => [Controllers\ShiftClosingController::class, 'update'],
            'DELETE /api/modules/bar_liquor/night_reports/shift_closing/{id}' => [Controllers\ShiftClosingController::class, 'destroy'],
            'GET /api/modules/bar_liquor/night_reports/cash_reconciliation' => [Controllers\CashReconciliationController::class, 'index'],
            'POST /api/modules/bar_liquor/night_reports/cash_reconciliation' => [Controllers\CashReconciliationController::class, 'store'],
            'GET /api/modules/bar_liquor/night_reports/cash_reconciliation/{id}' => [Controllers\CashReconciliationController::class, 'show'],
            'PUT /api/modules/bar_liquor/night_reports/cash_reconciliation/{id}' => [Controllers\CashReconciliationController::class, 'update'],
            'DELETE /api/modules/bar_liquor/night_reports/cash_reconciliation/{id}' => [Controllers\CashReconciliationController::class, 'destroy'],
        ];
    }
}
