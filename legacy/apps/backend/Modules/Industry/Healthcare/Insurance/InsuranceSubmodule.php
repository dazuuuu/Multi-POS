<?php

namespace App\Backend\Modules\Industry\Healthcare\Insurance;

class InsuranceSubmodule
{
    public const MODULE_KEY = 'healthcare';
    public const SUBMODULE_KEY = 'insurance';

    public static function features(): array
    {
        return [            'insurance_companies',
            'member_verification',
            'claim_preparation',
            'claim_tracking',
            'claim_reconciliation',
            'authorization_management',
        ];
    }

    public static function routes(): array
    {
        return [            'GET /api/modules/healthcare/insurance/insurance_companies' => [Controllers\InsuranceCompaniesController::class, 'index'],
            'POST /api/modules/healthcare/insurance/insurance_companies' => [Controllers\InsuranceCompaniesController::class, 'store'],
            'GET /api/modules/healthcare/insurance/insurance_companies/{id}' => [Controllers\InsuranceCompaniesController::class, 'show'],
            'PUT /api/modules/healthcare/insurance/insurance_companies/{id}' => [Controllers\InsuranceCompaniesController::class, 'update'],
            'DELETE /api/modules/healthcare/insurance/insurance_companies/{id}' => [Controllers\InsuranceCompaniesController::class, 'destroy'],
            'GET /api/modules/healthcare/insurance/member_verification' => [Controllers\MemberVerificationController::class, 'index'],
            'POST /api/modules/healthcare/insurance/member_verification' => [Controllers\MemberVerificationController::class, 'store'],
            'GET /api/modules/healthcare/insurance/member_verification/{id}' => [Controllers\MemberVerificationController::class, 'show'],
            'PUT /api/modules/healthcare/insurance/member_verification/{id}' => [Controllers\MemberVerificationController::class, 'update'],
            'DELETE /api/modules/healthcare/insurance/member_verification/{id}' => [Controllers\MemberVerificationController::class, 'destroy'],
            'GET /api/modules/healthcare/insurance/claim_preparation' => [Controllers\ClaimPreparationController::class, 'index'],
            'POST /api/modules/healthcare/insurance/claim_preparation' => [Controllers\ClaimPreparationController::class, 'store'],
            'GET /api/modules/healthcare/insurance/claim_preparation/{id}' => [Controllers\ClaimPreparationController::class, 'show'],
            'PUT /api/modules/healthcare/insurance/claim_preparation/{id}' => [Controllers\ClaimPreparationController::class, 'update'],
            'DELETE /api/modules/healthcare/insurance/claim_preparation/{id}' => [Controllers\ClaimPreparationController::class, 'destroy'],
            'GET /api/modules/healthcare/insurance/claim_tracking' => [Controllers\ClaimTrackingController::class, 'index'],
            'POST /api/modules/healthcare/insurance/claim_tracking' => [Controllers\ClaimTrackingController::class, 'store'],
            'GET /api/modules/healthcare/insurance/claim_tracking/{id}' => [Controllers\ClaimTrackingController::class, 'show'],
            'PUT /api/modules/healthcare/insurance/claim_tracking/{id}' => [Controllers\ClaimTrackingController::class, 'update'],
            'DELETE /api/modules/healthcare/insurance/claim_tracking/{id}' => [Controllers\ClaimTrackingController::class, 'destroy'],
            'GET /api/modules/healthcare/insurance/claim_reconciliation' => [Controllers\ClaimReconciliationController::class, 'index'],
            'POST /api/modules/healthcare/insurance/claim_reconciliation' => [Controllers\ClaimReconciliationController::class, 'store'],
            'GET /api/modules/healthcare/insurance/claim_reconciliation/{id}' => [Controllers\ClaimReconciliationController::class, 'show'],
            'PUT /api/modules/healthcare/insurance/claim_reconciliation/{id}' => [Controllers\ClaimReconciliationController::class, 'update'],
            'DELETE /api/modules/healthcare/insurance/claim_reconciliation/{id}' => [Controllers\ClaimReconciliationController::class, 'destroy'],
            'GET /api/modules/healthcare/insurance/authorization_management' => [Controllers\AuthorizationManagementController::class, 'index'],
            'POST /api/modules/healthcare/insurance/authorization_management' => [Controllers\AuthorizationManagementController::class, 'store'],
            'GET /api/modules/healthcare/insurance/authorization_management/{id}' => [Controllers\AuthorizationManagementController::class, 'show'],
            'PUT /api/modules/healthcare/insurance/authorization_management/{id}' => [Controllers\AuthorizationManagementController::class, 'update'],
            'DELETE /api/modules/healthcare/insurance/authorization_management/{id}' => [Controllers\AuthorizationManagementController::class, 'destroy'],
        ];
    }
}
