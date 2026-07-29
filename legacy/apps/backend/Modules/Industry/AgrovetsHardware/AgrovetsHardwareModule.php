<?php

namespace App\Backend\Modules\Industry\AgrovetsHardware;

class AgrovetsHardwareModule
{
    public const MODULE_KEY = 'agrovets_hardware';

    public static function submodules(): array
    {
        return [
            'agrovet',
            'farming',
            'equipment',
            'regulatory',
            'hardware',
            'services',
        ];
    }

    public static function routes(): array
    {
        return array_merge(
            ...\Agrovet\AgrovetSubmodule::routes(),
            ...\Farming\FarmingSubmodule::routes(),
            ...\Equipment\EquipmentSubmodule::routes(),
            ...\Regulatory\RegulatorySubmodule::routes(),
            ...\Hardware\HardwareSubmodule::routes(),
            ...\Services\ServicesSubmodule::routes(),
        );
    }
}
