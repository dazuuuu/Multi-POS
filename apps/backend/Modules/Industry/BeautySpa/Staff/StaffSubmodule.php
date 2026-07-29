<?php

namespace App\Backend\Modules\Industry\BeautySpa\Staff;

class StaffSubmodule
{
    public const MODULE_KEY = 'beauty_spa';
    public const SUBMODULE_KEY = 'staff';

    public static function features(): array
    {
        return [            'commission_management',
            'chair_rentals',
            'stylist_performance',
        ];
    }

    public static function routes(): array
    {
        return [            'GET /api/modules/beauty_spa/staff/commission_management' => [Controllers\CommissionManagementController::class, 'index'],
            'POST /api/modules/beauty_spa/staff/commission_management' => [Controllers\CommissionManagementController::class, 'store'],
            'GET /api/modules/beauty_spa/staff/commission_management/{id}' => [Controllers\CommissionManagementController::class, 'show'],
            'PUT /api/modules/beauty_spa/staff/commission_management/{id}' => [Controllers\CommissionManagementController::class, 'update'],
            'DELETE /api/modules/beauty_spa/staff/commission_management/{id}' => [Controllers\CommissionManagementController::class, 'destroy'],
            'GET /api/modules/beauty_spa/staff/chair_rentals' => [Controllers\ChairRentalsController::class, 'index'],
            'POST /api/modules/beauty_spa/staff/chair_rentals' => [Controllers\ChairRentalsController::class, 'store'],
            'GET /api/modules/beauty_spa/staff/chair_rentals/{id}' => [Controllers\ChairRentalsController::class, 'show'],
            'PUT /api/modules/beauty_spa/staff/chair_rentals/{id}' => [Controllers\ChairRentalsController::class, 'update'],
            'DELETE /api/modules/beauty_spa/staff/chair_rentals/{id}' => [Controllers\ChairRentalsController::class, 'destroy'],
            'GET /api/modules/beauty_spa/staff/stylist_performance' => [Controllers\StylistPerformanceController::class, 'index'],
            'POST /api/modules/beauty_spa/staff/stylist_performance' => [Controllers\StylistPerformanceController::class, 'store'],
            'GET /api/modules/beauty_spa/staff/stylist_performance/{id}' => [Controllers\StylistPerformanceController::class, 'show'],
            'PUT /api/modules/beauty_spa/staff/stylist_performance/{id}' => [Controllers\StylistPerformanceController::class, 'update'],
            'DELETE /api/modules/beauty_spa/staff/stylist_performance/{id}' => [Controllers\StylistPerformanceController::class, 'destroy'],
        ];
    }
}
