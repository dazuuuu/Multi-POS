<?php

namespace App\Backend\Modules\Industry\Healthcare\Maternity;

class MaternitySubmodule
{
    public const MODULE_KEY = 'healthcare';
    public const SUBMODULE_KEY = 'maternity';

    public static function features(): array
    {
        return [            'anc_visits',
            'delivery_records',
            'newborn_records',
            'postnatal_care',
            'immunization_schedules',
        ];
    }

    public static function routes(): array
    {
        return [            'GET /api/modules/healthcare/maternity/anc_visits' => [Controllers\AncVisitsController::class, 'index'],
            'POST /api/modules/healthcare/maternity/anc_visits' => [Controllers\AncVisitsController::class, 'store'],
            'GET /api/modules/healthcare/maternity/anc_visits/{id}' => [Controllers\AncVisitsController::class, 'show'],
            'PUT /api/modules/healthcare/maternity/anc_visits/{id}' => [Controllers\AncVisitsController::class, 'update'],
            'DELETE /api/modules/healthcare/maternity/anc_visits/{id}' => [Controllers\AncVisitsController::class, 'destroy'],
            'GET /api/modules/healthcare/maternity/delivery_records' => [Controllers\DeliveryRecordsController::class, 'index'],
            'POST /api/modules/healthcare/maternity/delivery_records' => [Controllers\DeliveryRecordsController::class, 'store'],
            'GET /api/modules/healthcare/maternity/delivery_records/{id}' => [Controllers\DeliveryRecordsController::class, 'show'],
            'PUT /api/modules/healthcare/maternity/delivery_records/{id}' => [Controllers\DeliveryRecordsController::class, 'update'],
            'DELETE /api/modules/healthcare/maternity/delivery_records/{id}' => [Controllers\DeliveryRecordsController::class, 'destroy'],
            'GET /api/modules/healthcare/maternity/newborn_records' => [Controllers\NewbornRecordsController::class, 'index'],
            'POST /api/modules/healthcare/maternity/newborn_records' => [Controllers\NewbornRecordsController::class, 'store'],
            'GET /api/modules/healthcare/maternity/newborn_records/{id}' => [Controllers\NewbornRecordsController::class, 'show'],
            'PUT /api/modules/healthcare/maternity/newborn_records/{id}' => [Controllers\NewbornRecordsController::class, 'update'],
            'DELETE /api/modules/healthcare/maternity/newborn_records/{id}' => [Controllers\NewbornRecordsController::class, 'destroy'],
            'GET /api/modules/healthcare/maternity/postnatal_care' => [Controllers\PostnatalCareController::class, 'index'],
            'POST /api/modules/healthcare/maternity/postnatal_care' => [Controllers\PostnatalCareController::class, 'store'],
            'GET /api/modules/healthcare/maternity/postnatal_care/{id}' => [Controllers\PostnatalCareController::class, 'show'],
            'PUT /api/modules/healthcare/maternity/postnatal_care/{id}' => [Controllers\PostnatalCareController::class, 'update'],
            'DELETE /api/modules/healthcare/maternity/postnatal_care/{id}' => [Controllers\PostnatalCareController::class, 'destroy'],
            'GET /api/modules/healthcare/maternity/immunization_schedules' => [Controllers\ImmunizationSchedulesController::class, 'index'],
            'POST /api/modules/healthcare/maternity/immunization_schedules' => [Controllers\ImmunizationSchedulesController::class, 'store'],
            'GET /api/modules/healthcare/maternity/immunization_schedules/{id}' => [Controllers\ImmunizationSchedulesController::class, 'show'],
            'PUT /api/modules/healthcare/maternity/immunization_schedules/{id}' => [Controllers\ImmunizationSchedulesController::class, 'update'],
            'DELETE /api/modules/healthcare/maternity/immunization_schedules/{id}' => [Controllers\ImmunizationSchedulesController::class, 'destroy'],
        ];
    }
}
