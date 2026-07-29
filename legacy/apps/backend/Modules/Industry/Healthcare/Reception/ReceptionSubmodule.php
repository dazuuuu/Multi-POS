<?php

namespace App\Backend\Modules\Industry\Healthcare\Reception;

class ReceptionSubmodule
{
    public const MODULE_KEY = 'healthcare';
    public const SUBMODULE_KEY = 'reception';

    public static function features(): array
    {
        return [            'patient_registration',
            'returning_patients',
            'patient_cards',
            'national_id_capture',
            'insurance_details',
            'queue_management',
            'appointment_scheduling',
            'walk_in_registration',
            'family_accounts',
        ];
    }

    public static function routes(): array
    {
        return [            'GET /api/modules/healthcare/reception/patient_registration' => [Controllers\PatientRegistrationController::class, 'index'],
            'POST /api/modules/healthcare/reception/patient_registration' => [Controllers\PatientRegistrationController::class, 'store'],
            'GET /api/modules/healthcare/reception/patient_registration/{id}' => [Controllers\PatientRegistrationController::class, 'show'],
            'PUT /api/modules/healthcare/reception/patient_registration/{id}' => [Controllers\PatientRegistrationController::class, 'update'],
            'DELETE /api/modules/healthcare/reception/patient_registration/{id}' => [Controllers\PatientRegistrationController::class, 'destroy'],
            'GET /api/modules/healthcare/reception/returning_patients' => [Controllers\ReturningPatientsController::class, 'index'],
            'POST /api/modules/healthcare/reception/returning_patients' => [Controllers\ReturningPatientsController::class, 'store'],
            'GET /api/modules/healthcare/reception/returning_patients/{id}' => [Controllers\ReturningPatientsController::class, 'show'],
            'PUT /api/modules/healthcare/reception/returning_patients/{id}' => [Controllers\ReturningPatientsController::class, 'update'],
            'DELETE /api/modules/healthcare/reception/returning_patients/{id}' => [Controllers\ReturningPatientsController::class, 'destroy'],
            'GET /api/modules/healthcare/reception/patient_cards' => [Controllers\PatientCardsController::class, 'index'],
            'POST /api/modules/healthcare/reception/patient_cards' => [Controllers\PatientCardsController::class, 'store'],
            'GET /api/modules/healthcare/reception/patient_cards/{id}' => [Controllers\PatientCardsController::class, 'show'],
            'PUT /api/modules/healthcare/reception/patient_cards/{id}' => [Controllers\PatientCardsController::class, 'update'],
            'DELETE /api/modules/healthcare/reception/patient_cards/{id}' => [Controllers\PatientCardsController::class, 'destroy'],
            'GET /api/modules/healthcare/reception/national_id_capture' => [Controllers\NationalIdCaptureController::class, 'index'],
            'POST /api/modules/healthcare/reception/national_id_capture' => [Controllers\NationalIdCaptureController::class, 'store'],
            'GET /api/modules/healthcare/reception/national_id_capture/{id}' => [Controllers\NationalIdCaptureController::class, 'show'],
            'PUT /api/modules/healthcare/reception/national_id_capture/{id}' => [Controllers\NationalIdCaptureController::class, 'update'],
            'DELETE /api/modules/healthcare/reception/national_id_capture/{id}' => [Controllers\NationalIdCaptureController::class, 'destroy'],
            'GET /api/modules/healthcare/reception/insurance_details' => [Controllers\InsuranceDetailsController::class, 'index'],
            'POST /api/modules/healthcare/reception/insurance_details' => [Controllers\InsuranceDetailsController::class, 'store'],
            'GET /api/modules/healthcare/reception/insurance_details/{id}' => [Controllers\InsuranceDetailsController::class, 'show'],
            'PUT /api/modules/healthcare/reception/insurance_details/{id}' => [Controllers\InsuranceDetailsController::class, 'update'],
            'DELETE /api/modules/healthcare/reception/insurance_details/{id}' => [Controllers\InsuranceDetailsController::class, 'destroy'],
            'GET /api/modules/healthcare/reception/queue_management' => [Controllers\QueueManagementController::class, 'index'],
            'POST /api/modules/healthcare/reception/queue_management' => [Controllers\QueueManagementController::class, 'store'],
            'GET /api/modules/healthcare/reception/queue_management/{id}' => [Controllers\QueueManagementController::class, 'show'],
            'PUT /api/modules/healthcare/reception/queue_management/{id}' => [Controllers\QueueManagementController::class, 'update'],
            'DELETE /api/modules/healthcare/reception/queue_management/{id}' => [Controllers\QueueManagementController::class, 'destroy'],
            'GET /api/modules/healthcare/reception/appointment_scheduling' => [Controllers\AppointmentSchedulingController::class, 'index'],
            'POST /api/modules/healthcare/reception/appointment_scheduling' => [Controllers\AppointmentSchedulingController::class, 'store'],
            'GET /api/modules/healthcare/reception/appointment_scheduling/{id}' => [Controllers\AppointmentSchedulingController::class, 'show'],
            'PUT /api/modules/healthcare/reception/appointment_scheduling/{id}' => [Controllers\AppointmentSchedulingController::class, 'update'],
            'DELETE /api/modules/healthcare/reception/appointment_scheduling/{id}' => [Controllers\AppointmentSchedulingController::class, 'destroy'],
            'GET /api/modules/healthcare/reception/walk_in_registration' => [Controllers\WalkInRegistrationController::class, 'index'],
            'POST /api/modules/healthcare/reception/walk_in_registration' => [Controllers\WalkInRegistrationController::class, 'store'],
            'GET /api/modules/healthcare/reception/walk_in_registration/{id}' => [Controllers\WalkInRegistrationController::class, 'show'],
            'PUT /api/modules/healthcare/reception/walk_in_registration/{id}' => [Controllers\WalkInRegistrationController::class, 'update'],
            'DELETE /api/modules/healthcare/reception/walk_in_registration/{id}' => [Controllers\WalkInRegistrationController::class, 'destroy'],
            'GET /api/modules/healthcare/reception/family_accounts' => [Controllers\FamilyAccountsController::class, 'index'],
            'POST /api/modules/healthcare/reception/family_accounts' => [Controllers\FamilyAccountsController::class, 'store'],
            'GET /api/modules/healthcare/reception/family_accounts/{id}' => [Controllers\FamilyAccountsController::class, 'show'],
            'PUT /api/modules/healthcare/reception/family_accounts/{id}' => [Controllers\FamilyAccountsController::class, 'update'],
            'DELETE /api/modules/healthcare/reception/family_accounts/{id}' => [Controllers\FamilyAccountsController::class, 'destroy'],
        ];
    }
}
