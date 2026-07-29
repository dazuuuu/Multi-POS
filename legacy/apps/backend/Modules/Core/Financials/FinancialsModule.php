<?php

namespace App\Backend\Modules\Core\Financials;

class FinancialsModule
{
    public const MODULE_KEY = 'financials';

    public static function features(): array
    {
        return [
            'expenses',
            'income',
            'profit_loss',
            'cashbook',
            'bank_accounts',
            'petty_cash',
            'tax_reports',
            'vat_reports',
            'daily_reconciliation',
        ];
    }

    public static function routes(): array
    {
        return [
            'GET /api/modules/financials/expenses' => [Controllers\ExpensesController::class, 'index'],
            'POST /api/modules/financials/expenses' => [Controllers\ExpensesController::class, 'store'],
            'GET /api/modules/financials/expenses/{id}' => [Controllers\ExpensesController::class, 'show'],
            'PUT /api/modules/financials/expenses/{id}' => [Controllers\ExpensesController::class, 'update'],
            'DELETE /api/modules/financials/expenses/{id}' => [Controllers\ExpensesController::class, 'destroy'],
            'GET /api/modules/financials/income' => [Controllers\IncomeController::class, 'index'],
            'POST /api/modules/financials/income' => [Controllers\IncomeController::class, 'store'],
            'GET /api/modules/financials/income/{id}' => [Controllers\IncomeController::class, 'show'],
            'PUT /api/modules/financials/income/{id}' => [Controllers\IncomeController::class, 'update'],
            'DELETE /api/modules/financials/income/{id}' => [Controllers\IncomeController::class, 'destroy'],
            'GET /api/modules/financials/profit_loss' => [Controllers\ProfitLossController::class, 'index'],
            'POST /api/modules/financials/profit_loss' => [Controllers\ProfitLossController::class, 'store'],
            'GET /api/modules/financials/profit_loss/{id}' => [Controllers\ProfitLossController::class, 'show'],
            'PUT /api/modules/financials/profit_loss/{id}' => [Controllers\ProfitLossController::class, 'update'],
            'DELETE /api/modules/financials/profit_loss/{id}' => [Controllers\ProfitLossController::class, 'destroy'],
            'GET /api/modules/financials/cashbook' => [Controllers\CashbookController::class, 'index'],
            'POST /api/modules/financials/cashbook' => [Controllers\CashbookController::class, 'store'],
            'GET /api/modules/financials/cashbook/{id}' => [Controllers\CashbookController::class, 'show'],
            'PUT /api/modules/financials/cashbook/{id}' => [Controllers\CashbookController::class, 'update'],
            'DELETE /api/modules/financials/cashbook/{id}' => [Controllers\CashbookController::class, 'destroy'],
            'GET /api/modules/financials/bank_accounts' => [Controllers\BankAccountsController::class, 'index'],
            'POST /api/modules/financials/bank_accounts' => [Controllers\BankAccountsController::class, 'store'],
            'GET /api/modules/financials/bank_accounts/{id}' => [Controllers\BankAccountsController::class, 'show'],
            'PUT /api/modules/financials/bank_accounts/{id}' => [Controllers\BankAccountsController::class, 'update'],
            'DELETE /api/modules/financials/bank_accounts/{id}' => [Controllers\BankAccountsController::class, 'destroy'],
            'GET /api/modules/financials/petty_cash' => [Controllers\PettyCashController::class, 'index'],
            'POST /api/modules/financials/petty_cash' => [Controllers\PettyCashController::class, 'store'],
            'GET /api/modules/financials/petty_cash/{id}' => [Controllers\PettyCashController::class, 'show'],
            'PUT /api/modules/financials/petty_cash/{id}' => [Controllers\PettyCashController::class, 'update'],
            'DELETE /api/modules/financials/petty_cash/{id}' => [Controllers\PettyCashController::class, 'destroy'],
            'GET /api/modules/financials/tax_reports' => [Controllers\TaxReportsController::class, 'index'],
            'POST /api/modules/financials/tax_reports' => [Controllers\TaxReportsController::class, 'store'],
            'GET /api/modules/financials/tax_reports/{id}' => [Controllers\TaxReportsController::class, 'show'],
            'PUT /api/modules/financials/tax_reports/{id}' => [Controllers\TaxReportsController::class, 'update'],
            'DELETE /api/modules/financials/tax_reports/{id}' => [Controllers\TaxReportsController::class, 'destroy'],
            'GET /api/modules/financials/vat_reports' => [Controllers\VatReportsController::class, 'index'],
            'POST /api/modules/financials/vat_reports' => [Controllers\VatReportsController::class, 'store'],
            'GET /api/modules/financials/vat_reports/{id}' => [Controllers\VatReportsController::class, 'show'],
            'PUT /api/modules/financials/vat_reports/{id}' => [Controllers\VatReportsController::class, 'update'],
            'DELETE /api/modules/financials/vat_reports/{id}' => [Controllers\VatReportsController::class, 'destroy'],
            'GET /api/modules/financials/daily_reconciliation' => [Controllers\DailyReconciliationController::class, 'index'],
            'POST /api/modules/financials/daily_reconciliation' => [Controllers\DailyReconciliationController::class, 'store'],
            'GET /api/modules/financials/daily_reconciliation/{id}' => [Controllers\DailyReconciliationController::class, 'show'],
            'PUT /api/modules/financials/daily_reconciliation/{id}' => [Controllers\DailyReconciliationController::class, 'update'],
            'DELETE /api/modules/financials/daily_reconciliation/{id}' => [Controllers\DailyReconciliationController::class, 'destroy'],
        ];
    }
}
