<?php

namespace App\Backend\Modules\Industry\Supermarkets\Checkout;

class CheckoutSubmodule
{
    public const MODULE_KEY = 'supermarkets';
    public const SUBMODULE_KEY = 'checkout';

    public static function features(): array
    {
        return [            'self_checkout',
            'multiple_cashiers',
            'queue_management',
        ];
    }

    public static function routes(): array
    {
        return [            'GET /api/modules/supermarkets/checkout/self_checkout' => [Controllers\SelfCheckoutController::class, 'index'],
            'POST /api/modules/supermarkets/checkout/self_checkout' => [Controllers\SelfCheckoutController::class, 'store'],
            'GET /api/modules/supermarkets/checkout/self_checkout/{id}' => [Controllers\SelfCheckoutController::class, 'show'],
            'PUT /api/modules/supermarkets/checkout/self_checkout/{id}' => [Controllers\SelfCheckoutController::class, 'update'],
            'DELETE /api/modules/supermarkets/checkout/self_checkout/{id}' => [Controllers\SelfCheckoutController::class, 'destroy'],
            'GET /api/modules/supermarkets/checkout/multiple_cashiers' => [Controllers\MultipleCashiersController::class, 'index'],
            'POST /api/modules/supermarkets/checkout/multiple_cashiers' => [Controllers\MultipleCashiersController::class, 'store'],
            'GET /api/modules/supermarkets/checkout/multiple_cashiers/{id}' => [Controllers\MultipleCashiersController::class, 'show'],
            'PUT /api/modules/supermarkets/checkout/multiple_cashiers/{id}' => [Controllers\MultipleCashiersController::class, 'update'],
            'DELETE /api/modules/supermarkets/checkout/multiple_cashiers/{id}' => [Controllers\MultipleCashiersController::class, 'destroy'],
            'GET /api/modules/supermarkets/checkout/queue_management' => [Controllers\QueueManagementController::class, 'index'],
            'POST /api/modules/supermarkets/checkout/queue_management' => [Controllers\QueueManagementController::class, 'store'],
            'GET /api/modules/supermarkets/checkout/queue_management/{id}' => [Controllers\QueueManagementController::class, 'show'],
            'PUT /api/modules/supermarkets/checkout/queue_management/{id}' => [Controllers\QueueManagementController::class, 'update'],
            'DELETE /api/modules/supermarkets/checkout/queue_management/{id}' => [Controllers\QueueManagementController::class, 'destroy'],
        ];
    }
}
