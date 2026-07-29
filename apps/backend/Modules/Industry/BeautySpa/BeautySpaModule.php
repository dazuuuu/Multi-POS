<?php

namespace App\Backend\Modules\Industry\BeautySpa;

class BeautySpaModule
{
    public const MODULE_KEY = 'beauty_spa';

    public static function submodules(): array
    {
        return [
            'appointments',
            'services',
            'staff',
            'beauty_products',
            'customer_records',
            'spa',
        ];
    }

    public static function routes(): array
    {
        return array_merge(
            ...\Appointments\AppointmentsSubmodule::routes(),
            ...\Services\ServicesSubmodule::routes(),
            ...\Staff\StaffSubmodule::routes(),
            ...\BeautyProducts\BeautyProductsSubmodule::routes(),
            ...\CustomerRecords\CustomerRecordsSubmodule::routes(),
            ...\Spa\SpaSubmodule::routes(),
        );
    }
}
