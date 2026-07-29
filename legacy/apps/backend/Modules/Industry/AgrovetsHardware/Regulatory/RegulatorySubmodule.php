<?php

namespace App\Backend\Modules\Industry\AgrovetsHardware\Regulatory;

class RegulatorySubmodule
{
    public const MODULE_KEY = 'agrovets_hardware';
    public const SUBMODULE_KEY = 'regulatory';

    public static function features(): array
    {
        return [            'chemical_batch_tracking',
            'expiry_dates',
            'safety_documentation',
        ];
    }

    public static function routes(): array
    {
        return [            'GET /api/modules/agrovets_hardware/regulatory/chemical_batch_tracking' => [Controllers\ChemicalBatchTrackingController::class, 'index'],
            'POST /api/modules/agrovets_hardware/regulatory/chemical_batch_tracking' => [Controllers\ChemicalBatchTrackingController::class, 'store'],
            'GET /api/modules/agrovets_hardware/regulatory/chemical_batch_tracking/{id}' => [Controllers\ChemicalBatchTrackingController::class, 'show'],
            'PUT /api/modules/agrovets_hardware/regulatory/chemical_batch_tracking/{id}' => [Controllers\ChemicalBatchTrackingController::class, 'update'],
            'DELETE /api/modules/agrovets_hardware/regulatory/chemical_batch_tracking/{id}' => [Controllers\ChemicalBatchTrackingController::class, 'destroy'],
            'GET /api/modules/agrovets_hardware/regulatory/expiry_dates' => [Controllers\ExpiryDatesController::class, 'index'],
            'POST /api/modules/agrovets_hardware/regulatory/expiry_dates' => [Controllers\ExpiryDatesController::class, 'store'],
            'GET /api/modules/agrovets_hardware/regulatory/expiry_dates/{id}' => [Controllers\ExpiryDatesController::class, 'show'],
            'PUT /api/modules/agrovets_hardware/regulatory/expiry_dates/{id}' => [Controllers\ExpiryDatesController::class, 'update'],
            'DELETE /api/modules/agrovets_hardware/regulatory/expiry_dates/{id}' => [Controllers\ExpiryDatesController::class, 'destroy'],
            'GET /api/modules/agrovets_hardware/regulatory/safety_documentation' => [Controllers\SafetyDocumentationController::class, 'index'],
            'POST /api/modules/agrovets_hardware/regulatory/safety_documentation' => [Controllers\SafetyDocumentationController::class, 'store'],
            'GET /api/modules/agrovets_hardware/regulatory/safety_documentation/{id}' => [Controllers\SafetyDocumentationController::class, 'show'],
            'PUT /api/modules/agrovets_hardware/regulatory/safety_documentation/{id}' => [Controllers\SafetyDocumentationController::class, 'update'],
            'DELETE /api/modules/agrovets_hardware/regulatory/safety_documentation/{id}' => [Controllers\SafetyDocumentationController::class, 'destroy'],
        ];
    }
}
