<?php

namespace App\Backend\Modules\Industry\Healthcare\Theatre;

class TheatreSubmodule
{
    public const MODULE_KEY = 'healthcare';
    public const SUBMODULE_KEY = 'theatre';

    public static function features(): array
    {
        return [            'surgery_scheduling',
            'theatre_utilization',
            'surgical_notes',
            'consent_forms',
            'operation_billing',
        ];
    }

    public static function routes(): array
    {
        return [            'GET /api/modules/healthcare/theatre/surgery_scheduling' => [Controllers\SurgerySchedulingController::class, 'index'],
            'POST /api/modules/healthcare/theatre/surgery_scheduling' => [Controllers\SurgerySchedulingController::class, 'store'],
            'GET /api/modules/healthcare/theatre/surgery_scheduling/{id}' => [Controllers\SurgerySchedulingController::class, 'show'],
            'PUT /api/modules/healthcare/theatre/surgery_scheduling/{id}' => [Controllers\SurgerySchedulingController::class, 'update'],
            'DELETE /api/modules/healthcare/theatre/surgery_scheduling/{id}' => [Controllers\SurgerySchedulingController::class, 'destroy'],
            'GET /api/modules/healthcare/theatre/theatre_utilization' => [Controllers\TheatreUtilizationController::class, 'index'],
            'POST /api/modules/healthcare/theatre/theatre_utilization' => [Controllers\TheatreUtilizationController::class, 'store'],
            'GET /api/modules/healthcare/theatre/theatre_utilization/{id}' => [Controllers\TheatreUtilizationController::class, 'show'],
            'PUT /api/modules/healthcare/theatre/theatre_utilization/{id}' => [Controllers\TheatreUtilizationController::class, 'update'],
            'DELETE /api/modules/healthcare/theatre/theatre_utilization/{id}' => [Controllers\TheatreUtilizationController::class, 'destroy'],
            'GET /api/modules/healthcare/theatre/surgical_notes' => [Controllers\SurgicalNotesController::class, 'index'],
            'POST /api/modules/healthcare/theatre/surgical_notes' => [Controllers\SurgicalNotesController::class, 'store'],
            'GET /api/modules/healthcare/theatre/surgical_notes/{id}' => [Controllers\SurgicalNotesController::class, 'show'],
            'PUT /api/modules/healthcare/theatre/surgical_notes/{id}' => [Controllers\SurgicalNotesController::class, 'update'],
            'DELETE /api/modules/healthcare/theatre/surgical_notes/{id}' => [Controllers\SurgicalNotesController::class, 'destroy'],
            'GET /api/modules/healthcare/theatre/consent_forms' => [Controllers\ConsentFormsController::class, 'index'],
            'POST /api/modules/healthcare/theatre/consent_forms' => [Controllers\ConsentFormsController::class, 'store'],
            'GET /api/modules/healthcare/theatre/consent_forms/{id}' => [Controllers\ConsentFormsController::class, 'show'],
            'PUT /api/modules/healthcare/theatre/consent_forms/{id}' => [Controllers\ConsentFormsController::class, 'update'],
            'DELETE /api/modules/healthcare/theatre/consent_forms/{id}' => [Controllers\ConsentFormsController::class, 'destroy'],
            'GET /api/modules/healthcare/theatre/operation_billing' => [Controllers\OperationBillingController::class, 'index'],
            'POST /api/modules/healthcare/theatre/operation_billing' => [Controllers\OperationBillingController::class, 'store'],
            'GET /api/modules/healthcare/theatre/operation_billing/{id}' => [Controllers\OperationBillingController::class, 'show'],
            'PUT /api/modules/healthcare/theatre/operation_billing/{id}' => [Controllers\OperationBillingController::class, 'update'],
            'DELETE /api/modules/healthcare/theatre/operation_billing/{id}' => [Controllers\OperationBillingController::class, 'destroy'],
        ];
    }
}
