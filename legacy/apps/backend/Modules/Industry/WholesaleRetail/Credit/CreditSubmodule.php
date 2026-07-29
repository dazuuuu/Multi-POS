<?php

namespace App\Backend\Modules\Industry\WholesaleRetail\Credit;

class CreditSubmodule
{
    public const MODULE_KEY = 'wholesale_retail';
    public const SUBMODULE_KEY = 'credit';

    public static function features(): array
    {
        return [            'customer_credit',
            'installments',
            'debt_reminders',
            'statements',
        ];
    }

    public static function routes(): array
    {
        return [            'GET /api/modules/wholesale_retail/credit/customer_credit' => [Controllers\CustomerCreditController::class, 'index'],
            'POST /api/modules/wholesale_retail/credit/customer_credit' => [Controllers\CustomerCreditController::class, 'store'],
            'GET /api/modules/wholesale_retail/credit/customer_credit/{id}' => [Controllers\CustomerCreditController::class, 'show'],
            'PUT /api/modules/wholesale_retail/credit/customer_credit/{id}' => [Controllers\CustomerCreditController::class, 'update'],
            'DELETE /api/modules/wholesale_retail/credit/customer_credit/{id}' => [Controllers\CustomerCreditController::class, 'destroy'],
            'GET /api/modules/wholesale_retail/credit/installments' => [Controllers\InstallmentsController::class, 'index'],
            'POST /api/modules/wholesale_retail/credit/installments' => [Controllers\InstallmentsController::class, 'store'],
            'GET /api/modules/wholesale_retail/credit/installments/{id}' => [Controllers\InstallmentsController::class, 'show'],
            'PUT /api/modules/wholesale_retail/credit/installments/{id}' => [Controllers\InstallmentsController::class, 'update'],
            'DELETE /api/modules/wholesale_retail/credit/installments/{id}' => [Controllers\InstallmentsController::class, 'destroy'],
            'GET /api/modules/wholesale_retail/credit/debt_reminders' => [Controllers\DebtRemindersController::class, 'index'],
            'POST /api/modules/wholesale_retail/credit/debt_reminders' => [Controllers\DebtRemindersController::class, 'store'],
            'GET /api/modules/wholesale_retail/credit/debt_reminders/{id}' => [Controllers\DebtRemindersController::class, 'show'],
            'PUT /api/modules/wholesale_retail/credit/debt_reminders/{id}' => [Controllers\DebtRemindersController::class, 'update'],
            'DELETE /api/modules/wholesale_retail/credit/debt_reminders/{id}' => [Controllers\DebtRemindersController::class, 'destroy'],
            'GET /api/modules/wholesale_retail/credit/statements' => [Controllers\StatementsController::class, 'index'],
            'POST /api/modules/wholesale_retail/credit/statements' => [Controllers\StatementsController::class, 'store'],
            'GET /api/modules/wholesale_retail/credit/statements/{id}' => [Controllers\StatementsController::class, 'show'],
            'PUT /api/modules/wholesale_retail/credit/statements/{id}' => [Controllers\StatementsController::class, 'update'],
            'DELETE /api/modules/wholesale_retail/credit/statements/{id}' => [Controllers\StatementsController::class, 'destroy'],
        ];
    }
}
