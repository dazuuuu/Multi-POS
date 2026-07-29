<?php

namespace App\Backend\Modules\Industry\AgrovetsHardware\Hardware;

class HardwareSubmodule
{
    public const MODULE_KEY = 'agrovets_hardware';
    public const SUBMODULE_KEY = 'hardware';

    public static function features(): array
    {
        return [            'paint',
            'cement',
            'steel',
            'timber',
            'plumbing',
            'electrical',
            'tools',
        ];
    }

    public static function routes(): array
    {
        return [            'GET /api/modules/agrovets_hardware/hardware/paint' => [Controllers\PaintController::class, 'index'],
            'POST /api/modules/agrovets_hardware/hardware/paint' => [Controllers\PaintController::class, 'store'],
            'GET /api/modules/agrovets_hardware/hardware/paint/{id}' => [Controllers\PaintController::class, 'show'],
            'PUT /api/modules/agrovets_hardware/hardware/paint/{id}' => [Controllers\PaintController::class, 'update'],
            'DELETE /api/modules/agrovets_hardware/hardware/paint/{id}' => [Controllers\PaintController::class, 'destroy'],
            'GET /api/modules/agrovets_hardware/hardware/cement' => [Controllers\CementController::class, 'index'],
            'POST /api/modules/agrovets_hardware/hardware/cement' => [Controllers\CementController::class, 'store'],
            'GET /api/modules/agrovets_hardware/hardware/cement/{id}' => [Controllers\CementController::class, 'show'],
            'PUT /api/modules/agrovets_hardware/hardware/cement/{id}' => [Controllers\CementController::class, 'update'],
            'DELETE /api/modules/agrovets_hardware/hardware/cement/{id}' => [Controllers\CementController::class, 'destroy'],
            'GET /api/modules/agrovets_hardware/hardware/steel' => [Controllers\SteelController::class, 'index'],
            'POST /api/modules/agrovets_hardware/hardware/steel' => [Controllers\SteelController::class, 'store'],
            'GET /api/modules/agrovets_hardware/hardware/steel/{id}' => [Controllers\SteelController::class, 'show'],
            'PUT /api/modules/agrovets_hardware/hardware/steel/{id}' => [Controllers\SteelController::class, 'update'],
            'DELETE /api/modules/agrovets_hardware/hardware/steel/{id}' => [Controllers\SteelController::class, 'destroy'],
            'GET /api/modules/agrovets_hardware/hardware/timber' => [Controllers\TimberController::class, 'index'],
            'POST /api/modules/agrovets_hardware/hardware/timber' => [Controllers\TimberController::class, 'store'],
            'GET /api/modules/agrovets_hardware/hardware/timber/{id}' => [Controllers\TimberController::class, 'show'],
            'PUT /api/modules/agrovets_hardware/hardware/timber/{id}' => [Controllers\TimberController::class, 'update'],
            'DELETE /api/modules/agrovets_hardware/hardware/timber/{id}' => [Controllers\TimberController::class, 'destroy'],
            'GET /api/modules/agrovets_hardware/hardware/plumbing' => [Controllers\PlumbingController::class, 'index'],
            'POST /api/modules/agrovets_hardware/hardware/plumbing' => [Controllers\PlumbingController::class, 'store'],
            'GET /api/modules/agrovets_hardware/hardware/plumbing/{id}' => [Controllers\PlumbingController::class, 'show'],
            'PUT /api/modules/agrovets_hardware/hardware/plumbing/{id}' => [Controllers\PlumbingController::class, 'update'],
            'DELETE /api/modules/agrovets_hardware/hardware/plumbing/{id}' => [Controllers\PlumbingController::class, 'destroy'],
            'GET /api/modules/agrovets_hardware/hardware/electrical' => [Controllers\ElectricalController::class, 'index'],
            'POST /api/modules/agrovets_hardware/hardware/electrical' => [Controllers\ElectricalController::class, 'store'],
            'GET /api/modules/agrovets_hardware/hardware/electrical/{id}' => [Controllers\ElectricalController::class, 'show'],
            'PUT /api/modules/agrovets_hardware/hardware/electrical/{id}' => [Controllers\ElectricalController::class, 'update'],
            'DELETE /api/modules/agrovets_hardware/hardware/electrical/{id}' => [Controllers\ElectricalController::class, 'destroy'],
            'GET /api/modules/agrovets_hardware/hardware/tools' => [Controllers\ToolsController::class, 'index'],
            'POST /api/modules/agrovets_hardware/hardware/tools' => [Controllers\ToolsController::class, 'store'],
            'GET /api/modules/agrovets_hardware/hardware/tools/{id}' => [Controllers\ToolsController::class, 'show'],
            'PUT /api/modules/agrovets_hardware/hardware/tools/{id}' => [Controllers\ToolsController::class, 'update'],
            'DELETE /api/modules/agrovets_hardware/hardware/tools/{id}' => [Controllers\ToolsController::class, 'destroy'],
        ];
    }
}
