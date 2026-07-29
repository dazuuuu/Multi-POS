<?php

namespace App\Backend\Modules\Industry\AgrovetsHardware\Equipment;

class EquipmentSubmodule
{
    public const MODULE_KEY = 'agrovets_hardware';
    public const SUBMODULE_KEY = 'equipment';

    public static function features(): array
    {
        return [            'farm_tools',
            'machinery',
            'spare_parts',
        ];
    }

    public static function routes(): array
    {
        return [            'GET /api/modules/agrovets_hardware/equipment/farm_tools' => [Controllers\FarmToolsController::class, 'index'],
            'POST /api/modules/agrovets_hardware/equipment/farm_tools' => [Controllers\FarmToolsController::class, 'store'],
            'GET /api/modules/agrovets_hardware/equipment/farm_tools/{id}' => [Controllers\FarmToolsController::class, 'show'],
            'PUT /api/modules/agrovets_hardware/equipment/farm_tools/{id}' => [Controllers\FarmToolsController::class, 'update'],
            'DELETE /api/modules/agrovets_hardware/equipment/farm_tools/{id}' => [Controllers\FarmToolsController::class, 'destroy'],
            'GET /api/modules/agrovets_hardware/equipment/machinery' => [Controllers\MachineryController::class, 'index'],
            'POST /api/modules/agrovets_hardware/equipment/machinery' => [Controllers\MachineryController::class, 'store'],
            'GET /api/modules/agrovets_hardware/equipment/machinery/{id}' => [Controllers\MachineryController::class, 'show'],
            'PUT /api/modules/agrovets_hardware/equipment/machinery/{id}' => [Controllers\MachineryController::class, 'update'],
            'DELETE /api/modules/agrovets_hardware/equipment/machinery/{id}' => [Controllers\MachineryController::class, 'destroy'],
            'GET /api/modules/agrovets_hardware/equipment/spare_parts' => [Controllers\SparePartsController::class, 'index'],
            'POST /api/modules/agrovets_hardware/equipment/spare_parts' => [Controllers\SparePartsController::class, 'store'],
            'GET /api/modules/agrovets_hardware/equipment/spare_parts/{id}' => [Controllers\SparePartsController::class, 'show'],
            'PUT /api/modules/agrovets_hardware/equipment/spare_parts/{id}' => [Controllers\SparePartsController::class, 'update'],
            'DELETE /api/modules/agrovets_hardware/equipment/spare_parts/{id}' => [Controllers\SparePartsController::class, 'destroy'],
        ];
    }
}
