<?php

namespace App\Backend\Modules\Industry\WholesaleRetail\Logistics;

class LogisticsSubmodule
{
    public const MODULE_KEY = 'wholesale_retail';
    public const SUBMODULE_KEY = 'logistics';

    public static function features(): array
    {
        return [            'dispatch',
            'fleet_management',
            'delivery_routes',
            'proof_of_delivery',
        ];
    }

    public static function routes(): array
    {
        return [            'GET /api/modules/wholesale_retail/logistics/dispatch' => [Controllers\DispatchController::class, 'index'],
            'POST /api/modules/wholesale_retail/logistics/dispatch' => [Controllers\DispatchController::class, 'store'],
            'GET /api/modules/wholesale_retail/logistics/dispatch/{id}' => [Controllers\DispatchController::class, 'show'],
            'PUT /api/modules/wholesale_retail/logistics/dispatch/{id}' => [Controllers\DispatchController::class, 'update'],
            'DELETE /api/modules/wholesale_retail/logistics/dispatch/{id}' => [Controllers\DispatchController::class, 'destroy'],
            'GET /api/modules/wholesale_retail/logistics/fleet_management' => [Controllers\FleetManagementController::class, 'index'],
            'POST /api/modules/wholesale_retail/logistics/fleet_management' => [Controllers\FleetManagementController::class, 'store'],
            'GET /api/modules/wholesale_retail/logistics/fleet_management/{id}' => [Controllers\FleetManagementController::class, 'show'],
            'PUT /api/modules/wholesale_retail/logistics/fleet_management/{id}' => [Controllers\FleetManagementController::class, 'update'],
            'DELETE /api/modules/wholesale_retail/logistics/fleet_management/{id}' => [Controllers\FleetManagementController::class, 'destroy'],
            'GET /api/modules/wholesale_retail/logistics/delivery_routes' => [Controllers\DeliveryRoutesController::class, 'index'],
            'POST /api/modules/wholesale_retail/logistics/delivery_routes' => [Controllers\DeliveryRoutesController::class, 'store'],
            'GET /api/modules/wholesale_retail/logistics/delivery_routes/{id}' => [Controllers\DeliveryRoutesController::class, 'show'],
            'PUT /api/modules/wholesale_retail/logistics/delivery_routes/{id}' => [Controllers\DeliveryRoutesController::class, 'update'],
            'DELETE /api/modules/wholesale_retail/logistics/delivery_routes/{id}' => [Controllers\DeliveryRoutesController::class, 'destroy'],
            'GET /api/modules/wholesale_retail/logistics/proof_of_delivery' => [Controllers\ProofOfDeliveryController::class, 'index'],
            'POST /api/modules/wholesale_retail/logistics/proof_of_delivery' => [Controllers\ProofOfDeliveryController::class, 'store'],
            'GET /api/modules/wholesale_retail/logistics/proof_of_delivery/{id}' => [Controllers\ProofOfDeliveryController::class, 'show'],
            'PUT /api/modules/wholesale_retail/logistics/proof_of_delivery/{id}' => [Controllers\ProofOfDeliveryController::class, 'update'],
            'DELETE /api/modules/wholesale_retail/logistics/proof_of_delivery/{id}' => [Controllers\ProofOfDeliveryController::class, 'destroy'],
        ];
    }
}
