<?php

namespace App\Backend\Modules\Industry\BeautySpa\CustomerRecords;

class CustomerRecordsSubmodule
{
    public const MODULE_KEY = 'beauty_spa';
    public const SUBMODULE_KEY = 'customer_records';

    public static function features(): array
    {
        return [            'visit_history',
            'preferred_stylist',
            'before_after_photos',
            'treatment_history',
        ];
    }

    public static function routes(): array
    {
        return [            'GET /api/modules/beauty_spa/customer_records/visit_history' => [Controllers\VisitHistoryController::class, 'index'],
            'POST /api/modules/beauty_spa/customer_records/visit_history' => [Controllers\VisitHistoryController::class, 'store'],
            'GET /api/modules/beauty_spa/customer_records/visit_history/{id}' => [Controllers\VisitHistoryController::class, 'show'],
            'PUT /api/modules/beauty_spa/customer_records/visit_history/{id}' => [Controllers\VisitHistoryController::class, 'update'],
            'DELETE /api/modules/beauty_spa/customer_records/visit_history/{id}' => [Controllers\VisitHistoryController::class, 'destroy'],
            'GET /api/modules/beauty_spa/customer_records/preferred_stylist' => [Controllers\PreferredStylistController::class, 'index'],
            'POST /api/modules/beauty_spa/customer_records/preferred_stylist' => [Controllers\PreferredStylistController::class, 'store'],
            'GET /api/modules/beauty_spa/customer_records/preferred_stylist/{id}' => [Controllers\PreferredStylistController::class, 'show'],
            'PUT /api/modules/beauty_spa/customer_records/preferred_stylist/{id}' => [Controllers\PreferredStylistController::class, 'update'],
            'DELETE /api/modules/beauty_spa/customer_records/preferred_stylist/{id}' => [Controllers\PreferredStylistController::class, 'destroy'],
            'GET /api/modules/beauty_spa/customer_records/before_after_photos' => [Controllers\BeforeAfterPhotosController::class, 'index'],
            'POST /api/modules/beauty_spa/customer_records/before_after_photos' => [Controllers\BeforeAfterPhotosController::class, 'store'],
            'GET /api/modules/beauty_spa/customer_records/before_after_photos/{id}' => [Controllers\BeforeAfterPhotosController::class, 'show'],
            'PUT /api/modules/beauty_spa/customer_records/before_after_photos/{id}' => [Controllers\BeforeAfterPhotosController::class, 'update'],
            'DELETE /api/modules/beauty_spa/customer_records/before_after_photos/{id}' => [Controllers\BeforeAfterPhotosController::class, 'destroy'],
            'GET /api/modules/beauty_spa/customer_records/treatment_history' => [Controllers\TreatmentHistoryController::class, 'index'],
            'POST /api/modules/beauty_spa/customer_records/treatment_history' => [Controllers\TreatmentHistoryController::class, 'store'],
            'GET /api/modules/beauty_spa/customer_records/treatment_history/{id}' => [Controllers\TreatmentHistoryController::class, 'show'],
            'PUT /api/modules/beauty_spa/customer_records/treatment_history/{id}' => [Controllers\TreatmentHistoryController::class, 'update'],
            'DELETE /api/modules/beauty_spa/customer_records/treatment_history/{id}' => [Controllers\TreatmentHistoryController::class, 'destroy'],
        ];
    }
}
