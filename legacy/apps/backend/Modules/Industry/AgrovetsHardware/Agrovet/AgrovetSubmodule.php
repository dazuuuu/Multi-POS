<?php

namespace App\Backend\Modules\Industry\AgrovetsHardware\Agrovet;

class AgrovetSubmodule
{
    public const MODULE_KEY = 'agrovets_hardware';
    public const SUBMODULE_KEY = 'agrovet';

    public static function features(): array
    {
        return [            'livestock',
            'animal_medicines',
            'vaccines',
            'feeds',
            'supplements',
        ];
    }

    public static function routes(): array
    {
        return [            'GET /api/modules/agrovets_hardware/agrovet/livestock' => [Controllers\LivestockController::class, 'index'],
            'POST /api/modules/agrovets_hardware/agrovet/livestock' => [Controllers\LivestockController::class, 'store'],
            'GET /api/modules/agrovets_hardware/agrovet/livestock/{id}' => [Controllers\LivestockController::class, 'show'],
            'PUT /api/modules/agrovets_hardware/agrovet/livestock/{id}' => [Controllers\LivestockController::class, 'update'],
            'DELETE /api/modules/agrovets_hardware/agrovet/livestock/{id}' => [Controllers\LivestockController::class, 'destroy'],
            'GET /api/modules/agrovets_hardware/agrovet/animal_medicines' => [Controllers\AnimalMedicinesController::class, 'index'],
            'POST /api/modules/agrovets_hardware/agrovet/animal_medicines' => [Controllers\AnimalMedicinesController::class, 'store'],
            'GET /api/modules/agrovets_hardware/agrovet/animal_medicines/{id}' => [Controllers\AnimalMedicinesController::class, 'show'],
            'PUT /api/modules/agrovets_hardware/agrovet/animal_medicines/{id}' => [Controllers\AnimalMedicinesController::class, 'update'],
            'DELETE /api/modules/agrovets_hardware/agrovet/animal_medicines/{id}' => [Controllers\AnimalMedicinesController::class, 'destroy'],
            'GET /api/modules/agrovets_hardware/agrovet/vaccines' => [Controllers\VaccinesController::class, 'index'],
            'POST /api/modules/agrovets_hardware/agrovet/vaccines' => [Controllers\VaccinesController::class, 'store'],
            'GET /api/modules/agrovets_hardware/agrovet/vaccines/{id}' => [Controllers\VaccinesController::class, 'show'],
            'PUT /api/modules/agrovets_hardware/agrovet/vaccines/{id}' => [Controllers\VaccinesController::class, 'update'],
            'DELETE /api/modules/agrovets_hardware/agrovet/vaccines/{id}' => [Controllers\VaccinesController::class, 'destroy'],
            'GET /api/modules/agrovets_hardware/agrovet/feeds' => [Controllers\FeedsController::class, 'index'],
            'POST /api/modules/agrovets_hardware/agrovet/feeds' => [Controllers\FeedsController::class, 'store'],
            'GET /api/modules/agrovets_hardware/agrovet/feeds/{id}' => [Controllers\FeedsController::class, 'show'],
            'PUT /api/modules/agrovets_hardware/agrovet/feeds/{id}' => [Controllers\FeedsController::class, 'update'],
            'DELETE /api/modules/agrovets_hardware/agrovet/feeds/{id}' => [Controllers\FeedsController::class, 'destroy'],
            'GET /api/modules/agrovets_hardware/agrovet/supplements' => [Controllers\SupplementsController::class, 'index'],
            'POST /api/modules/agrovets_hardware/agrovet/supplements' => [Controllers\SupplementsController::class, 'store'],
            'GET /api/modules/agrovets_hardware/agrovet/supplements/{id}' => [Controllers\SupplementsController::class, 'show'],
            'PUT /api/modules/agrovets_hardware/agrovet/supplements/{id}' => [Controllers\SupplementsController::class, 'update'],
            'DELETE /api/modules/agrovets_hardware/agrovet/supplements/{id}' => [Controllers\SupplementsController::class, 'destroy'],
        ];
    }
}
