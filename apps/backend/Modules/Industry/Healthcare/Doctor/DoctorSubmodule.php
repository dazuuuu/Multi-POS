<?php

namespace App\Backend\Modules\Industry\Healthcare\Doctor;

class DoctorSubmodule
{
    public const MODULE_KEY = 'healthcare';
    public const SUBMODULE_KEY = 'doctor';

    public static function features(): array
    {
        return [            'consultation_notes',
            'diagnosis_icd',
            'treatment_plans',
            'prescriptions',
            'follow_up_scheduling',
            'referral_letters',
            'sick_leave_notes',
            'medical_certificates',
        ];
    }

    public static function routes(): array
    {
        return [            'GET /api/modules/healthcare/doctor/consultation_notes' => [Controllers\ConsultationNotesController::class, 'index'],
            'POST /api/modules/healthcare/doctor/consultation_notes' => [Controllers\ConsultationNotesController::class, 'store'],
            'GET /api/modules/healthcare/doctor/consultation_notes/{id}' => [Controllers\ConsultationNotesController::class, 'show'],
            'PUT /api/modules/healthcare/doctor/consultation_notes/{id}' => [Controllers\ConsultationNotesController::class, 'update'],
            'DELETE /api/modules/healthcare/doctor/consultation_notes/{id}' => [Controllers\ConsultationNotesController::class, 'destroy'],
            'GET /api/modules/healthcare/doctor/diagnosis_icd' => [Controllers\DiagnosisIcdController::class, 'index'],
            'POST /api/modules/healthcare/doctor/diagnosis_icd' => [Controllers\DiagnosisIcdController::class, 'store'],
            'GET /api/modules/healthcare/doctor/diagnosis_icd/{id}' => [Controllers\DiagnosisIcdController::class, 'show'],
            'PUT /api/modules/healthcare/doctor/diagnosis_icd/{id}' => [Controllers\DiagnosisIcdController::class, 'update'],
            'DELETE /api/modules/healthcare/doctor/diagnosis_icd/{id}' => [Controllers\DiagnosisIcdController::class, 'destroy'],
            'GET /api/modules/healthcare/doctor/treatment_plans' => [Controllers\TreatmentPlansController::class, 'index'],
            'POST /api/modules/healthcare/doctor/treatment_plans' => [Controllers\TreatmentPlansController::class, 'store'],
            'GET /api/modules/healthcare/doctor/treatment_plans/{id}' => [Controllers\TreatmentPlansController::class, 'show'],
            'PUT /api/modules/healthcare/doctor/treatment_plans/{id}' => [Controllers\TreatmentPlansController::class, 'update'],
            'DELETE /api/modules/healthcare/doctor/treatment_plans/{id}' => [Controllers\TreatmentPlansController::class, 'destroy'],
            'GET /api/modules/healthcare/doctor/prescriptions' => [Controllers\PrescriptionsController::class, 'index'],
            'POST /api/modules/healthcare/doctor/prescriptions' => [Controllers\PrescriptionsController::class, 'store'],
            'GET /api/modules/healthcare/doctor/prescriptions/{id}' => [Controllers\PrescriptionsController::class, 'show'],
            'PUT /api/modules/healthcare/doctor/prescriptions/{id}' => [Controllers\PrescriptionsController::class, 'update'],
            'DELETE /api/modules/healthcare/doctor/prescriptions/{id}' => [Controllers\PrescriptionsController::class, 'destroy'],
            'GET /api/modules/healthcare/doctor/follow_up_scheduling' => [Controllers\FollowUpSchedulingController::class, 'index'],
            'POST /api/modules/healthcare/doctor/follow_up_scheduling' => [Controllers\FollowUpSchedulingController::class, 'store'],
            'GET /api/modules/healthcare/doctor/follow_up_scheduling/{id}' => [Controllers\FollowUpSchedulingController::class, 'show'],
            'PUT /api/modules/healthcare/doctor/follow_up_scheduling/{id}' => [Controllers\FollowUpSchedulingController::class, 'update'],
            'DELETE /api/modules/healthcare/doctor/follow_up_scheduling/{id}' => [Controllers\FollowUpSchedulingController::class, 'destroy'],
            'GET /api/modules/healthcare/doctor/referral_letters' => [Controllers\ReferralLettersController::class, 'index'],
            'POST /api/modules/healthcare/doctor/referral_letters' => [Controllers\ReferralLettersController::class, 'store'],
            'GET /api/modules/healthcare/doctor/referral_letters/{id}' => [Controllers\ReferralLettersController::class, 'show'],
            'PUT /api/modules/healthcare/doctor/referral_letters/{id}' => [Controllers\ReferralLettersController::class, 'update'],
            'DELETE /api/modules/healthcare/doctor/referral_letters/{id}' => [Controllers\ReferralLettersController::class, 'destroy'],
            'GET /api/modules/healthcare/doctor/sick_leave_notes' => [Controllers\SickLeaveNotesController::class, 'index'],
            'POST /api/modules/healthcare/doctor/sick_leave_notes' => [Controllers\SickLeaveNotesController::class, 'store'],
            'GET /api/modules/healthcare/doctor/sick_leave_notes/{id}' => [Controllers\SickLeaveNotesController::class, 'show'],
            'PUT /api/modules/healthcare/doctor/sick_leave_notes/{id}' => [Controllers\SickLeaveNotesController::class, 'update'],
            'DELETE /api/modules/healthcare/doctor/sick_leave_notes/{id}' => [Controllers\SickLeaveNotesController::class, 'destroy'],
            'GET /api/modules/healthcare/doctor/medical_certificates' => [Controllers\MedicalCertificatesController::class, 'index'],
            'POST /api/modules/healthcare/doctor/medical_certificates' => [Controllers\MedicalCertificatesController::class, 'store'],
            'GET /api/modules/healthcare/doctor/medical_certificates/{id}' => [Controllers\MedicalCertificatesController::class, 'show'],
            'PUT /api/modules/healthcare/doctor/medical_certificates/{id}' => [Controllers\MedicalCertificatesController::class, 'update'],
            'DELETE /api/modules/healthcare/doctor/medical_certificates/{id}' => [Controllers\MedicalCertificatesController::class, 'destroy'],
        ];
    }
}
