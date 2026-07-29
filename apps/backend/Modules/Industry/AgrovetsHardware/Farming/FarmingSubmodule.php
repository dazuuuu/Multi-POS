<?php

namespace App\Backend\Modules\Industry\AgrovetsHardware\Farming;

class FarmingSubmodule
{
    public const MODULE_KEY = 'agrovets_hardware';
    public const SUBMODULE_KEY = 'farming';

    public static function features(): array
    {
        return [            'seeds',
            'fertilizers',
            'chemicals',
            'irrigation_products',
        ];
    }

    public static function routes(): array
    {
        return [            'GET /api/modules/agrovets_hardware/farming/seeds' => [Controllers\SeedsController::class, 'index'],
            'POST /api/modules/agrovets_hardware/farming/seeds' => [Controllers\SeedsController::class, 'store'],
            'GET /api/modules/agrovets_hardware/farming/seeds/{id}' => [Controllers\SeedsController::class, 'show'],
            'PUT /api/modules/agrovets_hardware/farming/seeds/{id}' => [Controllers\SeedsController::class, 'update'],
            'DELETE /api/modules/agrovets_hardware/farming/seeds/{id}' => [Controllers\SeedsController::class, 'destroy'],
            'GET /api/modules/agrovets_hardware/farming/fertilizers' => [Controllers\FertilizersController::class, 'index'],
            'POST /api/modules/agrovets_hardware/farming/fertilizers' => [Controllers\FertilizersController::class, 'store'],
            'GET /api/modules/agrovets_hardware/farming/fertilizers/{id}' => [Controllers\FertilizersController::class, 'show'],
            'PUT /api/modules/agrovets_hardware/farming/fertilizers/{id}' => [Controllers\FertilizersController::class, 'update'],
            'DELETE /api/modules/agrovets_hardware/farming/fertilizers/{id}' => [Controllers\FertilizersController::class, 'destroy'],
            'GET /api/modules/agrovets_hardware/farming/chemicals' => [Controllers\ChemicalsController::class, 'index'],
            'POST /api/modules/agrovets_hardware/farming/chemicals' => [Controllers\ChemicalsController::class, 'store'],
            'GET /api/modules/agrovets_hardware/farming/chemicals/{id}' => [Controllers\ChemicalsController::class, 'show'],
            'PUT /api/modules/agrovets_hardware/farming/chemicals/{id}' => [Controllers\ChemicalsController::class, 'update'],
            'DELETE /api/modules/agrovets_hardware/farming/chemicals/{id}' => [Controllers\ChemicalsController::class, 'destroy'],
            'GET /api/modules/agrovets_hardware/farming/irrigation_products' => [Controllers\IrrigationProductsController::class, 'index'],
            'POST /api/modules/agrovets_hardware/farming/irrigation_products' => [Controllers\IrrigationProductsController::class, 'store'],
            'GET /api/modules/agrovets_hardware/farming/irrigation_products/{id}' => [Controllers\IrrigationProductsController::class, 'show'],
            'PUT /api/modules/agrovets_hardware/farming/irrigation_products/{id}' => [Controllers\IrrigationProductsController::class, 'update'],
            'DELETE /api/modules/agrovets_hardware/farming/irrigation_products/{id}' => [Controllers\IrrigationProductsController::class, 'destroy'],
        ];
    }
}
