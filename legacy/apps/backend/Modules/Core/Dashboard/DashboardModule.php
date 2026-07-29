<?php

namespace App\Backend\Modules\Core\Dashboard;

class DashboardModule
{
    public const MODULE_KEY = 'dashboard';

    public static function features(): array
    {
        return [
            'daily_sales',
            'weekly_sales',
            'monthly_sales',
            'annual_reports',
            'profit_analysis',
            'expenses',
            'cash_flow',
            'top_selling_products',
            'least_selling_products',
            'best_customers',
            'stock_alerts',
            'employee_performance',
            'branch_comparison',
            'graphs_analytics',
        ];
    }

    public static function routes(): array
    {
        return [
            'GET /api/modules/dashboard/daily_sales' => [Controllers\DailySalesController::class, 'index'],
            'POST /api/modules/dashboard/daily_sales' => [Controllers\DailySalesController::class, 'store'],
            'GET /api/modules/dashboard/daily_sales/{id}' => [Controllers\DailySalesController::class, 'show'],
            'PUT /api/modules/dashboard/daily_sales/{id}' => [Controllers\DailySalesController::class, 'update'],
            'DELETE /api/modules/dashboard/daily_sales/{id}' => [Controllers\DailySalesController::class, 'destroy'],
            'GET /api/modules/dashboard/weekly_sales' => [Controllers\WeeklySalesController::class, 'index'],
            'POST /api/modules/dashboard/weekly_sales' => [Controllers\WeeklySalesController::class, 'store'],
            'GET /api/modules/dashboard/weekly_sales/{id}' => [Controllers\WeeklySalesController::class, 'show'],
            'PUT /api/modules/dashboard/weekly_sales/{id}' => [Controllers\WeeklySalesController::class, 'update'],
            'DELETE /api/modules/dashboard/weekly_sales/{id}' => [Controllers\WeeklySalesController::class, 'destroy'],
            'GET /api/modules/dashboard/monthly_sales' => [Controllers\MonthlySalesController::class, 'index'],
            'POST /api/modules/dashboard/monthly_sales' => [Controllers\MonthlySalesController::class, 'store'],
            'GET /api/modules/dashboard/monthly_sales/{id}' => [Controllers\MonthlySalesController::class, 'show'],
            'PUT /api/modules/dashboard/monthly_sales/{id}' => [Controllers\MonthlySalesController::class, 'update'],
            'DELETE /api/modules/dashboard/monthly_sales/{id}' => [Controllers\MonthlySalesController::class, 'destroy'],
            'GET /api/modules/dashboard/annual_reports' => [Controllers\AnnualReportsController::class, 'index'],
            'POST /api/modules/dashboard/annual_reports' => [Controllers\AnnualReportsController::class, 'store'],
            'GET /api/modules/dashboard/annual_reports/{id}' => [Controllers\AnnualReportsController::class, 'show'],
            'PUT /api/modules/dashboard/annual_reports/{id}' => [Controllers\AnnualReportsController::class, 'update'],
            'DELETE /api/modules/dashboard/annual_reports/{id}' => [Controllers\AnnualReportsController::class, 'destroy'],
            'GET /api/modules/dashboard/profit_analysis' => [Controllers\ProfitAnalysisController::class, 'index'],
            'POST /api/modules/dashboard/profit_analysis' => [Controllers\ProfitAnalysisController::class, 'store'],
            'GET /api/modules/dashboard/profit_analysis/{id}' => [Controllers\ProfitAnalysisController::class, 'show'],
            'PUT /api/modules/dashboard/profit_analysis/{id}' => [Controllers\ProfitAnalysisController::class, 'update'],
            'DELETE /api/modules/dashboard/profit_analysis/{id}' => [Controllers\ProfitAnalysisController::class, 'destroy'],
            'GET /api/modules/dashboard/expenses' => [Controllers\ExpensesController::class, 'index'],
            'POST /api/modules/dashboard/expenses' => [Controllers\ExpensesController::class, 'store'],
            'GET /api/modules/dashboard/expenses/{id}' => [Controllers\ExpensesController::class, 'show'],
            'PUT /api/modules/dashboard/expenses/{id}' => [Controllers\ExpensesController::class, 'update'],
            'DELETE /api/modules/dashboard/expenses/{id}' => [Controllers\ExpensesController::class, 'destroy'],
            'GET /api/modules/dashboard/cash_flow' => [Controllers\CashFlowController::class, 'index'],
            'POST /api/modules/dashboard/cash_flow' => [Controllers\CashFlowController::class, 'store'],
            'GET /api/modules/dashboard/cash_flow/{id}' => [Controllers\CashFlowController::class, 'show'],
            'PUT /api/modules/dashboard/cash_flow/{id}' => [Controllers\CashFlowController::class, 'update'],
            'DELETE /api/modules/dashboard/cash_flow/{id}' => [Controllers\CashFlowController::class, 'destroy'],
            'GET /api/modules/dashboard/top_selling_products' => [Controllers\TopSellingProductsController::class, 'index'],
            'POST /api/modules/dashboard/top_selling_products' => [Controllers\TopSellingProductsController::class, 'store'],
            'GET /api/modules/dashboard/top_selling_products/{id}' => [Controllers\TopSellingProductsController::class, 'show'],
            'PUT /api/modules/dashboard/top_selling_products/{id}' => [Controllers\TopSellingProductsController::class, 'update'],
            'DELETE /api/modules/dashboard/top_selling_products/{id}' => [Controllers\TopSellingProductsController::class, 'destroy'],
            'GET /api/modules/dashboard/least_selling_products' => [Controllers\LeastSellingProductsController::class, 'index'],
            'POST /api/modules/dashboard/least_selling_products' => [Controllers\LeastSellingProductsController::class, 'store'],
            'GET /api/modules/dashboard/least_selling_products/{id}' => [Controllers\LeastSellingProductsController::class, 'show'],
            'PUT /api/modules/dashboard/least_selling_products/{id}' => [Controllers\LeastSellingProductsController::class, 'update'],
            'DELETE /api/modules/dashboard/least_selling_products/{id}' => [Controllers\LeastSellingProductsController::class, 'destroy'],
            'GET /api/modules/dashboard/best_customers' => [Controllers\BestCustomersController::class, 'index'],
            'POST /api/modules/dashboard/best_customers' => [Controllers\BestCustomersController::class, 'store'],
            'GET /api/modules/dashboard/best_customers/{id}' => [Controllers\BestCustomersController::class, 'show'],
            'PUT /api/modules/dashboard/best_customers/{id}' => [Controllers\BestCustomersController::class, 'update'],
            'DELETE /api/modules/dashboard/best_customers/{id}' => [Controllers\BestCustomersController::class, 'destroy'],
            'GET /api/modules/dashboard/stock_alerts' => [Controllers\StockAlertsController::class, 'index'],
            'POST /api/modules/dashboard/stock_alerts' => [Controllers\StockAlertsController::class, 'store'],
            'GET /api/modules/dashboard/stock_alerts/{id}' => [Controllers\StockAlertsController::class, 'show'],
            'PUT /api/modules/dashboard/stock_alerts/{id}' => [Controllers\StockAlertsController::class, 'update'],
            'DELETE /api/modules/dashboard/stock_alerts/{id}' => [Controllers\StockAlertsController::class, 'destroy'],
            'GET /api/modules/dashboard/employee_performance' => [Controllers\EmployeePerformanceController::class, 'index'],
            'POST /api/modules/dashboard/employee_performance' => [Controllers\EmployeePerformanceController::class, 'store'],
            'GET /api/modules/dashboard/employee_performance/{id}' => [Controllers\EmployeePerformanceController::class, 'show'],
            'PUT /api/modules/dashboard/employee_performance/{id}' => [Controllers\EmployeePerformanceController::class, 'update'],
            'DELETE /api/modules/dashboard/employee_performance/{id}' => [Controllers\EmployeePerformanceController::class, 'destroy'],
            'GET /api/modules/dashboard/branch_comparison' => [Controllers\BranchComparisonController::class, 'index'],
            'POST /api/modules/dashboard/branch_comparison' => [Controllers\BranchComparisonController::class, 'store'],
            'GET /api/modules/dashboard/branch_comparison/{id}' => [Controllers\BranchComparisonController::class, 'show'],
            'PUT /api/modules/dashboard/branch_comparison/{id}' => [Controllers\BranchComparisonController::class, 'update'],
            'DELETE /api/modules/dashboard/branch_comparison/{id}' => [Controllers\BranchComparisonController::class, 'destroy'],
            'GET /api/modules/dashboard/graphs_analytics' => [Controllers\GraphsAnalyticsController::class, 'index'],
            'POST /api/modules/dashboard/graphs_analytics' => [Controllers\GraphsAnalyticsController::class, 'store'],
            'GET /api/modules/dashboard/graphs_analytics/{id}' => [Controllers\GraphsAnalyticsController::class, 'show'],
            'PUT /api/modules/dashboard/graphs_analytics/{id}' => [Controllers\GraphsAnalyticsController::class, 'update'],
            'DELETE /api/modules/dashboard/graphs_analytics/{id}' => [Controllers\GraphsAnalyticsController::class, 'destroy'],
        ];
    }
}
