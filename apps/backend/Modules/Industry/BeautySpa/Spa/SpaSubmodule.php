<?php

namespace App\Backend\Modules\Industry\BeautySpa\Spa;

class SpaSubmodule
{
    public const MODULE_KEY = 'beauty_spa';
    public const SUBMODULE_KEY = 'spa';

    public static function features(): array
    {
        return [            'treatment_rooms',
            'packages',
            'memberships',
        ];
    }

    public static function routes(): array
    {
        return [            'GET /api/modules/beauty_spa/spa/treatment_rooms' => [Controllers\TreatmentRoomsController::class, 'index'],
            'POST /api/modules/beauty_spa/spa/treatment_rooms' => [Controllers\TreatmentRoomsController::class, 'store'],
            'GET /api/modules/beauty_spa/spa/treatment_rooms/{id}' => [Controllers\TreatmentRoomsController::class, 'show'],
            'PUT /api/modules/beauty_spa/spa/treatment_rooms/{id}' => [Controllers\TreatmentRoomsController::class, 'update'],
            'DELETE /api/modules/beauty_spa/spa/treatment_rooms/{id}' => [Controllers\TreatmentRoomsController::class, 'destroy'],
            'GET /api/modules/beauty_spa/spa/packages' => [Controllers\PackagesController::class, 'index'],
            'POST /api/modules/beauty_spa/spa/packages' => [Controllers\PackagesController::class, 'store'],
            'GET /api/modules/beauty_spa/spa/packages/{id}' => [Controllers\PackagesController::class, 'show'],
            'PUT /api/modules/beauty_spa/spa/packages/{id}' => [Controllers\PackagesController::class, 'update'],
            'DELETE /api/modules/beauty_spa/spa/packages/{id}' => [Controllers\PackagesController::class, 'destroy'],
            'GET /api/modules/beauty_spa/spa/memberships' => [Controllers\MembershipsController::class, 'index'],
            'POST /api/modules/beauty_spa/spa/memberships' => [Controllers\MembershipsController::class, 'store'],
            'GET /api/modules/beauty_spa/spa/memberships/{id}' => [Controllers\MembershipsController::class, 'show'],
            'PUT /api/modules/beauty_spa/spa/memberships/{id}' => [Controllers\MembershipsController::class, 'update'],
            'DELETE /api/modules/beauty_spa/spa/memberships/{id}' => [Controllers\MembershipsController::class, 'destroy'],
        ];
    }
}
