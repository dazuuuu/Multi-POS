<?php

namespace App\Backend\Modules\Industry\Healthcare\Dental;

class DentalSubmodule
{
    public const MODULE_KEY = 'healthcare';
    public const SUBMODULE_KEY = 'dental';

    public static function features(): array
    {
        return [            'dental_charting',
            'procedures',
            'treatment_plans',
            'xray_records',
        ];
    }

    public static function routes(): array
    {
        return [            'GET /api/modules/healthcare/dental/dental_charting' => [Controllers\DentalChartingController::class, 'index'],
            'POST /api/modules/healthcare/dental/dental_charting' => [Controllers\DentalChartingController::class, 'store'],
            'GET /api/modules/healthcare/dental/dental_charting/{id}' => [Controllers\DentalChartingController::class, 'show'],
            'PUT /api/modules/healthcare/dental/dental_charting/{id}' => [Controllers\DentalChartingController::class, 'update'],
            'DELETE /api/modules/healthcare/dental/dental_charting/{id}' => [Controllers\DentalChartingController::class, 'destroy'],
            'GET /api/modules/healthcare/dental/procedures' => [Controllers\ProceduresController::class, 'index'],
            'POST /api/modules/healthcare/dental/procedures' => [Controllers\ProceduresController::class, 'store'],
            'GET /api/modules/healthcare/dental/procedures/{id}' => [Controllers\ProceduresController::class, 'show'],
            'PUT /api/modules/healthcare/dental/procedures/{id}' => [Controllers\ProceduresController::class, 'update'],
            'DELETE /api/modules/healthcare/dental/procedures/{id}' => [Controllers\ProceduresController::class, 'destroy'],
            'GET /api/modules/healthcare/dental/treatment_plans' => [Controllers\TreatmentPlansController::class, 'index'],
            'POST /api/modules/healthcare/dental/treatment_plans' => [Controllers\TreatmentPlansController::class, 'store'],
            'GET /api/modules/healthcare/dental/treatment_plans/{id}' => [Controllers\TreatmentPlansController::class, 'show'],
            'PUT /api/modules/healthcare/dental/treatment_plans/{id}' => [Controllers\TreatmentPlansController::class, 'update'],
            'DELETE /api/modules/healthcare/dental/treatment_plans/{id}' => [Controllers\TreatmentPlansController::class, 'destroy'],
            'GET /api/modules/healthcare/dental/xray_records' => [Controllers\XrayRecordsController::class, 'index'],
            'POST /api/modules/healthcare/dental/xray_records' => [Controllers\XrayRecordsController::class, 'store'],
            'GET /api/modules/healthcare/dental/xray_records/{id}' => [Controllers\XrayRecordsController::class, 'show'],
            'PUT /api/modules/healthcare/dental/xray_records/{id}' => [Controllers\XrayRecordsController::class, 'update'],
            'DELETE /api/modules/healthcare/dental/xray_records/{id}' => [Controllers\XrayRecordsController::class, 'destroy'],
        ];
    }
}
