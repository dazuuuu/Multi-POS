<?php

namespace App\Backend\Modules\Core\Employees;

class EmployeesModule
{
    public const MODULE_KEY = 'employees';

    public static function features(): array
    {
        return [
            'employees',
            'attendance',
            'commissions',
            'payroll_integration',
            'performance_tracking',
            'sales_targets',
            'shift_management',
        ];
    }

    public static function routes(): array
    {
        return [
            'GET /api/modules/employees/employees' => [Controllers\EmployeesController::class, 'index'],
            'POST /api/modules/employees/employees' => [Controllers\EmployeesController::class, 'store'],
            'GET /api/modules/employees/employees/{id}' => [Controllers\EmployeesController::class, 'show'],
            'PUT /api/modules/employees/employees/{id}' => [Controllers\EmployeesController::class, 'update'],
            'DELETE /api/modules/employees/employees/{id}' => [Controllers\EmployeesController::class, 'destroy'],
            'GET /api/modules/employees/attendance' => [Controllers\AttendanceController::class, 'index'],
            'POST /api/modules/employees/attendance' => [Controllers\AttendanceController::class, 'store'],
            'GET /api/modules/employees/attendance/{id}' => [Controllers\AttendanceController::class, 'show'],
            'PUT /api/modules/employees/attendance/{id}' => [Controllers\AttendanceController::class, 'update'],
            'DELETE /api/modules/employees/attendance/{id}' => [Controllers\AttendanceController::class, 'destroy'],
            'GET /api/modules/employees/commissions' => [Controllers\CommissionsController::class, 'index'],
            'POST /api/modules/employees/commissions' => [Controllers\CommissionsController::class, 'store'],
            'GET /api/modules/employees/commissions/{id}' => [Controllers\CommissionsController::class, 'show'],
            'PUT /api/modules/employees/commissions/{id}' => [Controllers\CommissionsController::class, 'update'],
            'DELETE /api/modules/employees/commissions/{id}' => [Controllers\CommissionsController::class, 'destroy'],
            'GET /api/modules/employees/payroll_integration' => [Controllers\PayrollIntegrationController::class, 'index'],
            'POST /api/modules/employees/payroll_integration' => [Controllers\PayrollIntegrationController::class, 'store'],
            'GET /api/modules/employees/payroll_integration/{id}' => [Controllers\PayrollIntegrationController::class, 'show'],
            'PUT /api/modules/employees/payroll_integration/{id}' => [Controllers\PayrollIntegrationController::class, 'update'],
            'DELETE /api/modules/employees/payroll_integration/{id}' => [Controllers\PayrollIntegrationController::class, 'destroy'],
            'GET /api/modules/employees/performance_tracking' => [Controllers\PerformanceTrackingController::class, 'index'],
            'POST /api/modules/employees/performance_tracking' => [Controllers\PerformanceTrackingController::class, 'store'],
            'GET /api/modules/employees/performance_tracking/{id}' => [Controllers\PerformanceTrackingController::class, 'show'],
            'PUT /api/modules/employees/performance_tracking/{id}' => [Controllers\PerformanceTrackingController::class, 'update'],
            'DELETE /api/modules/employees/performance_tracking/{id}' => [Controllers\PerformanceTrackingController::class, 'destroy'],
            'GET /api/modules/employees/sales_targets' => [Controllers\SalesTargetsController::class, 'index'],
            'POST /api/modules/employees/sales_targets' => [Controllers\SalesTargetsController::class, 'store'],
            'GET /api/modules/employees/sales_targets/{id}' => [Controllers\SalesTargetsController::class, 'show'],
            'PUT /api/modules/employees/sales_targets/{id}' => [Controllers\SalesTargetsController::class, 'update'],
            'DELETE /api/modules/employees/sales_targets/{id}' => [Controllers\SalesTargetsController::class, 'destroy'],
            'GET /api/modules/employees/shift_management' => [Controllers\ShiftManagementController::class, 'index'],
            'POST /api/modules/employees/shift_management' => [Controllers\ShiftManagementController::class, 'store'],
            'GET /api/modules/employees/shift_management/{id}' => [Controllers\ShiftManagementController::class, 'show'],
            'PUT /api/modules/employees/shift_management/{id}' => [Controllers\ShiftManagementController::class, 'update'],
            'DELETE /api/modules/employees/shift_management/{id}' => [Controllers\ShiftManagementController::class, 'destroy'],
        ];
    }
}
