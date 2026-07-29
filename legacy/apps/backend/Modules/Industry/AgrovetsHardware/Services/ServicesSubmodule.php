<?php

namespace App\Backend\Modules\Industry\AgrovetsHardware\Services;

class ServicesSubmodule
{
    public const MODULE_KEY = 'agrovets_hardware';
    public const SUBMODULE_KEY = 'services';

    public static function features(): array
    {
        return [            'cutting_services',
            'paint_mixing',
            'deliveries',
            'contractor_accounts',
        ];
    }

    public static function routes(): array
    {
        return [            'GET /api/modules/agrovets_hardware/services/cutting_services' => [Controllers\CuttingServicesController::class, 'index'],
            'POST /api/modules/agrovets_hardware/services/cutting_services' => [Controllers\CuttingServicesController::class, 'store'],
            'GET /api/modules/agrovets_hardware/services/cutting_services/{id}' => [Controllers\CuttingServicesController::class, 'show'],
            'PUT /api/modules/agrovets_hardware/services/cutting_services/{id}' => [Controllers\CuttingServicesController::class, 'update'],
            'DELETE /api/modules/agrovets_hardware/services/cutting_services/{id}' => [Controllers\CuttingServicesController::class, 'destroy'],
            'GET /api/modules/agrovets_hardware/services/paint_mixing' => [Controllers\PaintMixingController::class, 'index'],
            'POST /api/modules/agrovets_hardware/services/paint_mixing' => [Controllers\PaintMixingController::class, 'store'],
            'GET /api/modules/agrovets_hardware/services/paint_mixing/{id}' => [Controllers\PaintMixingController::class, 'show'],
            'PUT /api/modules/agrovets_hardware/services/paint_mixing/{id}' => [Controllers\PaintMixingController::class, 'update'],
            'DELETE /api/modules/agrovets_hardware/services/paint_mixing/{id}' => [Controllers\PaintMixingController::class, 'destroy'],
            'GET /api/modules/agrovets_hardware/services/deliveries' => [Controllers\DeliveriesController::class, 'index'],
            'POST /api/modules/agrovets_hardware/services/deliveries' => [Controllers\DeliveriesController::class, 'store'],
            'GET /api/modules/agrovets_hardware/services/deliveries/{id}' => [Controllers\DeliveriesController::class, 'show'],
            'PUT /api/modules/agrovets_hardware/services/deliveries/{id}' => [Controllers\DeliveriesController::class, 'update'],
            'DELETE /api/modules/agrovets_hardware/services/deliveries/{id}' => [Controllers\DeliveriesController::class, 'destroy'],
            'GET /api/modules/agrovets_hardware/services/contractor_accounts' => [Controllers\ContractorAccountsController::class, 'index'],
            'POST /api/modules/agrovets_hardware/services/contractor_accounts' => [Controllers\ContractorAccountsController::class, 'store'],
            'GET /api/modules/agrovets_hardware/services/contractor_accounts/{id}' => [Controllers\ContractorAccountsController::class, 'show'],
            'PUT /api/modules/agrovets_hardware/services/contractor_accounts/{id}' => [Controllers\ContractorAccountsController::class, 'update'],
            'DELETE /api/modules/agrovets_hardware/services/contractor_accounts/{id}' => [Controllers\ContractorAccountsController::class, 'destroy'],
        ];
    }
}
