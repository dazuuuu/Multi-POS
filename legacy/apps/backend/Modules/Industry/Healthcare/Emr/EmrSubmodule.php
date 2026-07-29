<?php

namespace App\Backend\Modules\Industry\Healthcare\Emr;

class EmrSubmodule
{
    public const MODULE_KEY = 'healthcare';
    public const SUBMODULE_KEY = 'emr';

    public static function features(): array
    {
        return [            'patient_demographics',
            'medical_history',
            'allergies',
            'chronic_conditions',
            'previous_diagnoses',
            'clinical_notes',
            'vital_signs',
            'immunization_records',
            'attachments',
        ];
    }

    public static function routes(): array
    {
        return [            'GET /api/modules/healthcare/emr/patient_demographics' => [Controllers\PatientDemographicsController::class, 'index'],
            'POST /api/modules/healthcare/emr/patient_demographics' => [Controllers\PatientDemographicsController::class, 'store'],
            'GET /api/modules/healthcare/emr/patient_demographics/{id}' => [Controllers\PatientDemographicsController::class, 'show'],
            'PUT /api/modules/healthcare/emr/patient_demographics/{id}' => [Controllers\PatientDemographicsController::class, 'update'],
            'DELETE /api/modules/healthcare/emr/patient_demographics/{id}' => [Controllers\PatientDemographicsController::class, 'destroy'],
            'GET /api/modules/healthcare/emr/medical_history' => [Controllers\MedicalHistoryController::class, 'index'],
            'POST /api/modules/healthcare/emr/medical_history' => [Controllers\MedicalHistoryController::class, 'store'],
            'GET /api/modules/healthcare/emr/medical_history/{id}' => [Controllers\MedicalHistoryController::class, 'show'],
            'PUT /api/modules/healthcare/emr/medical_history/{id}' => [Controllers\MedicalHistoryController::class, 'update'],
            'DELETE /api/modules/healthcare/emr/medical_history/{id}' => [Controllers\MedicalHistoryController::class, 'destroy'],
            'GET /api/modules/healthcare/emr/allergies' => [Controllers\AllergiesController::class, 'index'],
            'POST /api/modules/healthcare/emr/allergies' => [Controllers\AllergiesController::class, 'store'],
            'GET /api/modules/healthcare/emr/allergies/{id}' => [Controllers\AllergiesController::class, 'show'],
            'PUT /api/modules/healthcare/emr/allergies/{id}' => [Controllers\AllergiesController::class, 'update'],
            'DELETE /api/modules/healthcare/emr/allergies/{id}' => [Controllers\AllergiesController::class, 'destroy'],
            'GET /api/modules/healthcare/emr/chronic_conditions' => [Controllers\ChronicConditionsController::class, 'index'],
            'POST /api/modules/healthcare/emr/chronic_conditions' => [Controllers\ChronicConditionsController::class, 'store'],
            'GET /api/modules/healthcare/emr/chronic_conditions/{id}' => [Controllers\ChronicConditionsController::class, 'show'],
            'PUT /api/modules/healthcare/emr/chronic_conditions/{id}' => [Controllers\ChronicConditionsController::class, 'update'],
            'DELETE /api/modules/healthcare/emr/chronic_conditions/{id}' => [Controllers\ChronicConditionsController::class, 'destroy'],
            'GET /api/modules/healthcare/emr/previous_diagnoses' => [Controllers\PreviousDiagnosesController::class, 'index'],
            'POST /api/modules/healthcare/emr/previous_diagnoses' => [Controllers\PreviousDiagnosesController::class, 'store'],
            'GET /api/modules/healthcare/emr/previous_diagnoses/{id}' => [Controllers\PreviousDiagnosesController::class, 'show'],
            'PUT /api/modules/healthcare/emr/previous_diagnoses/{id}' => [Controllers\PreviousDiagnosesController::class, 'update'],
            'DELETE /api/modules/healthcare/emr/previous_diagnoses/{id}' => [Controllers\PreviousDiagnosesController::class, 'destroy'],
            'GET /api/modules/healthcare/emr/clinical_notes' => [Controllers\ClinicalNotesController::class, 'index'],
            'POST /api/modules/healthcare/emr/clinical_notes' => [Controllers\ClinicalNotesController::class, 'store'],
            'GET /api/modules/healthcare/emr/clinical_notes/{id}' => [Controllers\ClinicalNotesController::class, 'show'],
            'PUT /api/modules/healthcare/emr/clinical_notes/{id}' => [Controllers\ClinicalNotesController::class, 'update'],
            'DELETE /api/modules/healthcare/emr/clinical_notes/{id}' => [Controllers\ClinicalNotesController::class, 'destroy'],
            'GET /api/modules/healthcare/emr/vital_signs' => [Controllers\VitalSignsController::class, 'index'],
            'POST /api/modules/healthcare/emr/vital_signs' => [Controllers\VitalSignsController::class, 'store'],
            'GET /api/modules/healthcare/emr/vital_signs/{id}' => [Controllers\VitalSignsController::class, 'show'],
            'PUT /api/modules/healthcare/emr/vital_signs/{id}' => [Controllers\VitalSignsController::class, 'update'],
            'DELETE /api/modules/healthcare/emr/vital_signs/{id}' => [Controllers\VitalSignsController::class, 'destroy'],
            'GET /api/modules/healthcare/emr/immunization_records' => [Controllers\ImmunizationRecordsController::class, 'index'],
            'POST /api/modules/healthcare/emr/immunization_records' => [Controllers\ImmunizationRecordsController::class, 'store'],
            'GET /api/modules/healthcare/emr/immunization_records/{id}' => [Controllers\ImmunizationRecordsController::class, 'show'],
            'PUT /api/modules/healthcare/emr/immunization_records/{id}' => [Controllers\ImmunizationRecordsController::class, 'update'],
            'DELETE /api/modules/healthcare/emr/immunization_records/{id}' => [Controllers\ImmunizationRecordsController::class, 'destroy'],
            'GET /api/modules/healthcare/emr/attachments' => [Controllers\AttachmentsController::class, 'index'],
            'POST /api/modules/healthcare/emr/attachments' => [Controllers\AttachmentsController::class, 'store'],
            'GET /api/modules/healthcare/emr/attachments/{id}' => [Controllers\AttachmentsController::class, 'show'],
            'PUT /api/modules/healthcare/emr/attachments/{id}' => [Controllers\AttachmentsController::class, 'update'],
            'DELETE /api/modules/healthcare/emr/attachments/{id}' => [Controllers\AttachmentsController::class, 'destroy'],
        ];
    }
}
