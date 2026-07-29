<?php

namespace App\Backend\Modules\Industry\BeautySpa\Services;

class ServicesSubmodule
{
    public const MODULE_KEY = 'beauty_spa';
    public const SUBMODULE_KEY = 'services';

    public static function features(): array
    {
        return [            'haircuts',
            'hair_coloring',
            'braiding',
            'nails',
            'massage',
            'facial',
            'waxing',
            'makeup',
        ];
    }

    public static function routes(): array
    {
        return [            'GET /api/modules/beauty_spa/services/haircuts' => [Controllers\HaircutsController::class, 'index'],
            'POST /api/modules/beauty_spa/services/haircuts' => [Controllers\HaircutsController::class, 'store'],
            'GET /api/modules/beauty_spa/services/haircuts/{id}' => [Controllers\HaircutsController::class, 'show'],
            'PUT /api/modules/beauty_spa/services/haircuts/{id}' => [Controllers\HaircutsController::class, 'update'],
            'DELETE /api/modules/beauty_spa/services/haircuts/{id}' => [Controllers\HaircutsController::class, 'destroy'],
            'GET /api/modules/beauty_spa/services/hair_coloring' => [Controllers\HairColoringController::class, 'index'],
            'POST /api/modules/beauty_spa/services/hair_coloring' => [Controllers\HairColoringController::class, 'store'],
            'GET /api/modules/beauty_spa/services/hair_coloring/{id}' => [Controllers\HairColoringController::class, 'show'],
            'PUT /api/modules/beauty_spa/services/hair_coloring/{id}' => [Controllers\HairColoringController::class, 'update'],
            'DELETE /api/modules/beauty_spa/services/hair_coloring/{id}' => [Controllers\HairColoringController::class, 'destroy'],
            'GET /api/modules/beauty_spa/services/braiding' => [Controllers\BraidingController::class, 'index'],
            'POST /api/modules/beauty_spa/services/braiding' => [Controllers\BraidingController::class, 'store'],
            'GET /api/modules/beauty_spa/services/braiding/{id}' => [Controllers\BraidingController::class, 'show'],
            'PUT /api/modules/beauty_spa/services/braiding/{id}' => [Controllers\BraidingController::class, 'update'],
            'DELETE /api/modules/beauty_spa/services/braiding/{id}' => [Controllers\BraidingController::class, 'destroy'],
            'GET /api/modules/beauty_spa/services/nails' => [Controllers\NailsController::class, 'index'],
            'POST /api/modules/beauty_spa/services/nails' => [Controllers\NailsController::class, 'store'],
            'GET /api/modules/beauty_spa/services/nails/{id}' => [Controllers\NailsController::class, 'show'],
            'PUT /api/modules/beauty_spa/services/nails/{id}' => [Controllers\NailsController::class, 'update'],
            'DELETE /api/modules/beauty_spa/services/nails/{id}' => [Controllers\NailsController::class, 'destroy'],
            'GET /api/modules/beauty_spa/services/massage' => [Controllers\MassageController::class, 'index'],
            'POST /api/modules/beauty_spa/services/massage' => [Controllers\MassageController::class, 'store'],
            'GET /api/modules/beauty_spa/services/massage/{id}' => [Controllers\MassageController::class, 'show'],
            'PUT /api/modules/beauty_spa/services/massage/{id}' => [Controllers\MassageController::class, 'update'],
            'DELETE /api/modules/beauty_spa/services/massage/{id}' => [Controllers\MassageController::class, 'destroy'],
            'GET /api/modules/beauty_spa/services/facial' => [Controllers\FacialController::class, 'index'],
            'POST /api/modules/beauty_spa/services/facial' => [Controllers\FacialController::class, 'store'],
            'GET /api/modules/beauty_spa/services/facial/{id}' => [Controllers\FacialController::class, 'show'],
            'PUT /api/modules/beauty_spa/services/facial/{id}' => [Controllers\FacialController::class, 'update'],
            'DELETE /api/modules/beauty_spa/services/facial/{id}' => [Controllers\FacialController::class, 'destroy'],
            'GET /api/modules/beauty_spa/services/waxing' => [Controllers\WaxingController::class, 'index'],
            'POST /api/modules/beauty_spa/services/waxing' => [Controllers\WaxingController::class, 'store'],
            'GET /api/modules/beauty_spa/services/waxing/{id}' => [Controllers\WaxingController::class, 'show'],
            'PUT /api/modules/beauty_spa/services/waxing/{id}' => [Controllers\WaxingController::class, 'update'],
            'DELETE /api/modules/beauty_spa/services/waxing/{id}' => [Controllers\WaxingController::class, 'destroy'],
            'GET /api/modules/beauty_spa/services/makeup' => [Controllers\MakeupController::class, 'index'],
            'POST /api/modules/beauty_spa/services/makeup' => [Controllers\MakeupController::class, 'store'],
            'GET /api/modules/beauty_spa/services/makeup/{id}' => [Controllers\MakeupController::class, 'show'],
            'PUT /api/modules/beauty_spa/services/makeup/{id}' => [Controllers\MakeupController::class, 'update'],
            'DELETE /api/modules/beauty_spa/services/makeup/{id}' => [Controllers\MakeupController::class, 'destroy'],
        ];
    }
}
