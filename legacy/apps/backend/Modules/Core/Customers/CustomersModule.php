<?php

namespace App\Backend\Modules\Core\Customers;

class CustomersModule
{
    public const MODULE_KEY = 'customers';

    public static function features(): array
    {
        return [
            'customer_profiles',
            'loyalty_points',
            'memberships',
            'customer_groups',
            'credit_limits',
            'customer_statements',
            'purchase_history',
            'birthday_reminders',
        ];
    }

    public static function routes(): array
    {
        return [
            'GET /api/modules/customers/customer_profiles' => [Controllers\CustomerProfilesController::class, 'index'],
            'POST /api/modules/customers/customer_profiles' => [Controllers\CustomerProfilesController::class, 'store'],
            'GET /api/modules/customers/customer_profiles/{id}' => [Controllers\CustomerProfilesController::class, 'show'],
            'PUT /api/modules/customers/customer_profiles/{id}' => [Controllers\CustomerProfilesController::class, 'update'],
            'DELETE /api/modules/customers/customer_profiles/{id}' => [Controllers\CustomerProfilesController::class, 'destroy'],
            'GET /api/modules/customers/loyalty_points' => [Controllers\LoyaltyPointsController::class, 'index'],
            'POST /api/modules/customers/loyalty_points' => [Controllers\LoyaltyPointsController::class, 'store'],
            'GET /api/modules/customers/loyalty_points/{id}' => [Controllers\LoyaltyPointsController::class, 'show'],
            'PUT /api/modules/customers/loyalty_points/{id}' => [Controllers\LoyaltyPointsController::class, 'update'],
            'DELETE /api/modules/customers/loyalty_points/{id}' => [Controllers\LoyaltyPointsController::class, 'destroy'],
            'GET /api/modules/customers/memberships' => [Controllers\MembershipsController::class, 'index'],
            'POST /api/modules/customers/memberships' => [Controllers\MembershipsController::class, 'store'],
            'GET /api/modules/customers/memberships/{id}' => [Controllers\MembershipsController::class, 'show'],
            'PUT /api/modules/customers/memberships/{id}' => [Controllers\MembershipsController::class, 'update'],
            'DELETE /api/modules/customers/memberships/{id}' => [Controllers\MembershipsController::class, 'destroy'],
            'GET /api/modules/customers/customer_groups' => [Controllers\CustomerGroupsController::class, 'index'],
            'POST /api/modules/customers/customer_groups' => [Controllers\CustomerGroupsController::class, 'store'],
            'GET /api/modules/customers/customer_groups/{id}' => [Controllers\CustomerGroupsController::class, 'show'],
            'PUT /api/modules/customers/customer_groups/{id}' => [Controllers\CustomerGroupsController::class, 'update'],
            'DELETE /api/modules/customers/customer_groups/{id}' => [Controllers\CustomerGroupsController::class, 'destroy'],
            'GET /api/modules/customers/credit_limits' => [Controllers\CreditLimitsController::class, 'index'],
            'POST /api/modules/customers/credit_limits' => [Controllers\CreditLimitsController::class, 'store'],
            'GET /api/modules/customers/credit_limits/{id}' => [Controllers\CreditLimitsController::class, 'show'],
            'PUT /api/modules/customers/credit_limits/{id}' => [Controllers\CreditLimitsController::class, 'update'],
            'DELETE /api/modules/customers/credit_limits/{id}' => [Controllers\CreditLimitsController::class, 'destroy'],
            'GET /api/modules/customers/customer_statements' => [Controllers\CustomerStatementsController::class, 'index'],
            'POST /api/modules/customers/customer_statements' => [Controllers\CustomerStatementsController::class, 'store'],
            'GET /api/modules/customers/customer_statements/{id}' => [Controllers\CustomerStatementsController::class, 'show'],
            'PUT /api/modules/customers/customer_statements/{id}' => [Controllers\CustomerStatementsController::class, 'update'],
            'DELETE /api/modules/customers/customer_statements/{id}' => [Controllers\CustomerStatementsController::class, 'destroy'],
            'GET /api/modules/customers/purchase_history' => [Controllers\PurchaseHistoryController::class, 'index'],
            'POST /api/modules/customers/purchase_history' => [Controllers\PurchaseHistoryController::class, 'store'],
            'GET /api/modules/customers/purchase_history/{id}' => [Controllers\PurchaseHistoryController::class, 'show'],
            'PUT /api/modules/customers/purchase_history/{id}' => [Controllers\PurchaseHistoryController::class, 'update'],
            'DELETE /api/modules/customers/purchase_history/{id}' => [Controllers\PurchaseHistoryController::class, 'destroy'],
            'GET /api/modules/customers/birthday_reminders' => [Controllers\BirthdayRemindersController::class, 'index'],
            'POST /api/modules/customers/birthday_reminders' => [Controllers\BirthdayRemindersController::class, 'store'],
            'GET /api/modules/customers/birthday_reminders/{id}' => [Controllers\BirthdayRemindersController::class, 'show'],
            'PUT /api/modules/customers/birthday_reminders/{id}' => [Controllers\BirthdayRemindersController::class, 'update'],
            'DELETE /api/modules/customers/birthday_reminders/{id}' => [Controllers\BirthdayRemindersController::class, 'destroy'],
        ];
    }
}
