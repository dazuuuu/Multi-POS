<?php

namespace App\Backend\Modules\Industry\Healthcare\Nursing;

class NursingSubmodule
{
    public const MODULE_KEY = 'healthcare';
    public const SUBMODULE_KEY = 'nursing';

    public static function features(): array
    {
        return [            'triage',
            'vital_signs',
            'medication_administration',
            'nursing_notes',
            'ward_observations',
        ];
    }

    public static function routes(): array
    {
        return [            'GET /api/modules/healthcare/nursing/triage' => [Controllers\TriageController::class, 'index'],
            'POST /api/modules/healthcare/nursing/triage' => [Controllers\TriageController::class, 'store'],
            'GET /api/modules/healthcare/nursing/triage/{id}' => [Controllers\TriageController::class, 'show'],
            'PUT /api/modules/healthcare/nursing/triage/{id}' => [Controllers\TriageController::class, 'update'],
            'DELETE /api/modules/healthcare/nursing/triage/{id}' => [Controllers\TriageController::class, 'destroy'],
            'GET /api/modules/healthcare/nursing/vital_signs' => [Controllers\VitalSignsController::class, 'index'],
            'POST /api/modules/healthcare/nursing/vital_signs' => [Controllers\VitalSignsController::class, 'store'],
            'GET /api/modules/healthcare/nursing/vital_signs/{id}' => [Controllers\VitalSignsController::class, 'show'],
            'PUT /api/modules/healthcare/nursing/vital_signs/{id}' => [Controllers\VitalSignsController::class, 'update'],
            'DELETE /api/modules/healthcare/nursing/vital_signs/{id}' => [Controllers\VitalSignsController::class, 'destroy'],
            'GET /api/modules/healthcare/nursing/medication_administration' => [Controllers\MedicationAdministrationController::class, 'index'],
            'POST /api/modules/healthcare/nursing/medication_administration' => [Controllers\MedicationAdministrationController::class, 'store'],
            'GET /api/modules/healthcare/nursing/medication_administration/{id}' => [Controllers\MedicationAdministrationController::class, 'show'],
            'PUT /api/modules/healthcare/nursing/medication_administration/{id}' => [Controllers\MedicationAdministrationController::class, 'update'],
            'DELETE /api/modules/healthcare/nursing/medication_administration/{id}' => [Controllers\MedicationAdministrationController::class, 'destroy'],
            'GET /api/modules/healthcare/nursing/nursing_notes' => [Controllers\NursingNotesController::class, 'index'],
            'POST /api/modules/healthcare/nursing/nursing_notes' => [Controllers\NursingNotesController::class, 'store'],
            'GET /api/modules/healthcare/nursing/nursing_notes/{id}' => [Controllers\NursingNotesController::class, 'show'],
            'PUT /api/modules/healthcare/nursing/nursing_notes/{id}' => [Controllers\NursingNotesController::class, 'update'],
            'DELETE /api/modules/healthcare/nursing/nursing_notes/{id}' => [Controllers\NursingNotesController::class, 'destroy'],
            'GET /api/modules/healthcare/nursing/ward_observations' => [Controllers\WardObservationsController::class, 'index'],
            'POST /api/modules/healthcare/nursing/ward_observations' => [Controllers\WardObservationsController::class, 'store'],
            'GET /api/modules/healthcare/nursing/ward_observations/{id}' => [Controllers\WardObservationsController::class, 'show'],
            'PUT /api/modules/healthcare/nursing/ward_observations/{id}' => [Controllers\WardObservationsController::class, 'update'],
            'DELETE /api/modules/healthcare/nursing/ward_observations/{id}' => [Controllers\WardObservationsController::class, 'destroy'],
        ];
    }
}
