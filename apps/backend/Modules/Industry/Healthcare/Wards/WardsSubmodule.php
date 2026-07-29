<?php

namespace App\Backend\Modules\Industry\Healthcare\Wards;

class WardsSubmodule
{
    public const MODULE_KEY = 'healthcare';
    public const SUBMODULE_KEY = 'wards';

    public static function features(): array
    {
        return [            'bed_management',
            'admissions',
            'transfers',
            'discharges',
            'ward_billing',
            'nursing_assignments',
        ];
    }

    public static function routes(): array
    {
        return [            'GET /api/modules/healthcare/wards/bed_management' => [Controllers\BedManagementController::class, 'index'],
            'POST /api/modules/healthcare/wards/bed_management' => [Controllers\BedManagementController::class, 'store'],
            'GET /api/modules/healthcare/wards/bed_management/{id}' => [Controllers\BedManagementController::class, 'show'],
            'PUT /api/modules/healthcare/wards/bed_management/{id}' => [Controllers\BedManagementController::class, 'update'],
            'DELETE /api/modules/healthcare/wards/bed_management/{id}' => [Controllers\BedManagementController::class, 'destroy'],
            'GET /api/modules/healthcare/wards/admissions' => [Controllers\AdmissionsController::class, 'index'],
            'POST /api/modules/healthcare/wards/admissions' => [Controllers\AdmissionsController::class, 'store'],
            'GET /api/modules/healthcare/wards/admissions/{id}' => [Controllers\AdmissionsController::class, 'show'],
            'PUT /api/modules/healthcare/wards/admissions/{id}' => [Controllers\AdmissionsController::class, 'update'],
            'DELETE /api/modules/healthcare/wards/admissions/{id}' => [Controllers\AdmissionsController::class, 'destroy'],
            'GET /api/modules/healthcare/wards/transfers' => [Controllers\TransfersController::class, 'index'],
            'POST /api/modules/healthcare/wards/transfers' => [Controllers\TransfersController::class, 'store'],
            'GET /api/modules/healthcare/wards/transfers/{id}' => [Controllers\TransfersController::class, 'show'],
            'PUT /api/modules/healthcare/wards/transfers/{id}' => [Controllers\TransfersController::class, 'update'],
            'DELETE /api/modules/healthcare/wards/transfers/{id}' => [Controllers\TransfersController::class, 'destroy'],
            'GET /api/modules/healthcare/wards/discharges' => [Controllers\DischargesController::class, 'index'],
            'POST /api/modules/healthcare/wards/discharges' => [Controllers\DischargesController::class, 'store'],
            'GET /api/modules/healthcare/wards/discharges/{id}' => [Controllers\DischargesController::class, 'show'],
            'PUT /api/modules/healthcare/wards/discharges/{id}' => [Controllers\DischargesController::class, 'update'],
            'DELETE /api/modules/healthcare/wards/discharges/{id}' => [Controllers\DischargesController::class, 'destroy'],
            'GET /api/modules/healthcare/wards/ward_billing' => [Controllers\WardBillingController::class, 'index'],
            'POST /api/modules/healthcare/wards/ward_billing' => [Controllers\WardBillingController::class, 'store'],
            'GET /api/modules/healthcare/wards/ward_billing/{id}' => [Controllers\WardBillingController::class, 'show'],
            'PUT /api/modules/healthcare/wards/ward_billing/{id}' => [Controllers\WardBillingController::class, 'update'],
            'DELETE /api/modules/healthcare/wards/ward_billing/{id}' => [Controllers\WardBillingController::class, 'destroy'],
            'GET /api/modules/healthcare/wards/nursing_assignments' => [Controllers\NursingAssignmentsController::class, 'index'],
            'POST /api/modules/healthcare/wards/nursing_assignments' => [Controllers\NursingAssignmentsController::class, 'store'],
            'GET /api/modules/healthcare/wards/nursing_assignments/{id}' => [Controllers\NursingAssignmentsController::class, 'show'],
            'PUT /api/modules/healthcare/wards/nursing_assignments/{id}' => [Controllers\NursingAssignmentsController::class, 'update'],
            'DELETE /api/modules/healthcare/wards/nursing_assignments/{id}' => [Controllers\NursingAssignmentsController::class, 'destroy'],
        ];
    }
}
