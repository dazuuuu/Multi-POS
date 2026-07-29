<?php

namespace App\Backend\Modules\Industry\Healthcare\Billing;

class BillingSubmodule
{
    public const MODULE_KEY = 'healthcare';
    public const SUBMODULE_KEY = 'billing';

    public static function features(): array
    {
        return [            'consultation_billing',
            'laboratory_billing',
            'pharmacy_billing',
            'procedure_billing',
            'package_billing',
            'insurance_billing',
            'co_payments',
            'deposits',
            'refunds',
            'credit_billing',
        ];
    }

    public static function routes(): array
    {
        return [            'GET /api/modules/healthcare/billing/consultation_billing' => [Controllers\ConsultationBillingController::class, 'index'],
            'POST /api/modules/healthcare/billing/consultation_billing' => [Controllers\ConsultationBillingController::class, 'store'],
            'GET /api/modules/healthcare/billing/consultation_billing/{id}' => [Controllers\ConsultationBillingController::class, 'show'],
            'PUT /api/modules/healthcare/billing/consultation_billing/{id}' => [Controllers\ConsultationBillingController::class, 'update'],
            'DELETE /api/modules/healthcare/billing/consultation_billing/{id}' => [Controllers\ConsultationBillingController::class, 'destroy'],
            'GET /api/modules/healthcare/billing/laboratory_billing' => [Controllers\LaboratoryBillingController::class, 'index'],
            'POST /api/modules/healthcare/billing/laboratory_billing' => [Controllers\LaboratoryBillingController::class, 'store'],
            'GET /api/modules/healthcare/billing/laboratory_billing/{id}' => [Controllers\LaboratoryBillingController::class, 'show'],
            'PUT /api/modules/healthcare/billing/laboratory_billing/{id}' => [Controllers\LaboratoryBillingController::class, 'update'],
            'DELETE /api/modules/healthcare/billing/laboratory_billing/{id}' => [Controllers\LaboratoryBillingController::class, 'destroy'],
            'GET /api/modules/healthcare/billing/pharmacy_billing' => [Controllers\PharmacyBillingController::class, 'index'],
            'POST /api/modules/healthcare/billing/pharmacy_billing' => [Controllers\PharmacyBillingController::class, 'store'],
            'GET /api/modules/healthcare/billing/pharmacy_billing/{id}' => [Controllers\PharmacyBillingController::class, 'show'],
            'PUT /api/modules/healthcare/billing/pharmacy_billing/{id}' => [Controllers\PharmacyBillingController::class, 'update'],
            'DELETE /api/modules/healthcare/billing/pharmacy_billing/{id}' => [Controllers\PharmacyBillingController::class, 'destroy'],
            'GET /api/modules/healthcare/billing/procedure_billing' => [Controllers\ProcedureBillingController::class, 'index'],
            'POST /api/modules/healthcare/billing/procedure_billing' => [Controllers\ProcedureBillingController::class, 'store'],
            'GET /api/modules/healthcare/billing/procedure_billing/{id}' => [Controllers\ProcedureBillingController::class, 'show'],
            'PUT /api/modules/healthcare/billing/procedure_billing/{id}' => [Controllers\ProcedureBillingController::class, 'update'],
            'DELETE /api/modules/healthcare/billing/procedure_billing/{id}' => [Controllers\ProcedureBillingController::class, 'destroy'],
            'GET /api/modules/healthcare/billing/package_billing' => [Controllers\PackageBillingController::class, 'index'],
            'POST /api/modules/healthcare/billing/package_billing' => [Controllers\PackageBillingController::class, 'store'],
            'GET /api/modules/healthcare/billing/package_billing/{id}' => [Controllers\PackageBillingController::class, 'show'],
            'PUT /api/modules/healthcare/billing/package_billing/{id}' => [Controllers\PackageBillingController::class, 'update'],
            'DELETE /api/modules/healthcare/billing/package_billing/{id}' => [Controllers\PackageBillingController::class, 'destroy'],
            'GET /api/modules/healthcare/billing/insurance_billing' => [Controllers\InsuranceBillingController::class, 'index'],
            'POST /api/modules/healthcare/billing/insurance_billing' => [Controllers\InsuranceBillingController::class, 'store'],
            'GET /api/modules/healthcare/billing/insurance_billing/{id}' => [Controllers\InsuranceBillingController::class, 'show'],
            'PUT /api/modules/healthcare/billing/insurance_billing/{id}' => [Controllers\InsuranceBillingController::class, 'update'],
            'DELETE /api/modules/healthcare/billing/insurance_billing/{id}' => [Controllers\InsuranceBillingController::class, 'destroy'],
            'GET /api/modules/healthcare/billing/co_payments' => [Controllers\CoPaymentsController::class, 'index'],
            'POST /api/modules/healthcare/billing/co_payments' => [Controllers\CoPaymentsController::class, 'store'],
            'GET /api/modules/healthcare/billing/co_payments/{id}' => [Controllers\CoPaymentsController::class, 'show'],
            'PUT /api/modules/healthcare/billing/co_payments/{id}' => [Controllers\CoPaymentsController::class, 'update'],
            'DELETE /api/modules/healthcare/billing/co_payments/{id}' => [Controllers\CoPaymentsController::class, 'destroy'],
            'GET /api/modules/healthcare/billing/deposits' => [Controllers\DepositsController::class, 'index'],
            'POST /api/modules/healthcare/billing/deposits' => [Controllers\DepositsController::class, 'store'],
            'GET /api/modules/healthcare/billing/deposits/{id}' => [Controllers\DepositsController::class, 'show'],
            'PUT /api/modules/healthcare/billing/deposits/{id}' => [Controllers\DepositsController::class, 'update'],
            'DELETE /api/modules/healthcare/billing/deposits/{id}' => [Controllers\DepositsController::class, 'destroy'],
            'GET /api/modules/healthcare/billing/refunds' => [Controllers\RefundsController::class, 'index'],
            'POST /api/modules/healthcare/billing/refunds' => [Controllers\RefundsController::class, 'store'],
            'GET /api/modules/healthcare/billing/refunds/{id}' => [Controllers\RefundsController::class, 'show'],
            'PUT /api/modules/healthcare/billing/refunds/{id}' => [Controllers\RefundsController::class, 'update'],
            'DELETE /api/modules/healthcare/billing/refunds/{id}' => [Controllers\RefundsController::class, 'destroy'],
            'GET /api/modules/healthcare/billing/credit_billing' => [Controllers\CreditBillingController::class, 'index'],
            'POST /api/modules/healthcare/billing/credit_billing' => [Controllers\CreditBillingController::class, 'store'],
            'GET /api/modules/healthcare/billing/credit_billing/{id}' => [Controllers\CreditBillingController::class, 'show'],
            'PUT /api/modules/healthcare/billing/credit_billing/{id}' => [Controllers\CreditBillingController::class, 'update'],
            'DELETE /api/modules/healthcare/billing/credit_billing/{id}' => [Controllers\CreditBillingController::class, 'destroy'],
        ];
    }
}
