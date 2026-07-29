<?php

namespace App\Backend\Modules\Industry\Healthcare;

class HealthcareModule
{
    public const MODULE_KEY = 'healthcare';

    public static function submodules(): array
    {
        return [
            'reception',
            'emr',
            'doctor',
            'nursing',
            'laboratory',
            'radiology',
            'pharmacy',
            'billing',
            'insurance',
            'wards',
            'theatre',
            'maternity',
            'dental',
            'physiotherapy',
            'administration',
        ];
    }

    public static function routes(): array
    {
        return array_merge(
            ...\Reception\ReceptionSubmodule::routes(),
            ...\Emr\EmrSubmodule::routes(),
            ...\Doctor\DoctorSubmodule::routes(),
            ...\Nursing\NursingSubmodule::routes(),
            ...\Laboratory\LaboratorySubmodule::routes(),
            ...\Radiology\RadiologySubmodule::routes(),
            ...\Pharmacy\PharmacySubmodule::routes(),
            ...\Billing\BillingSubmodule::routes(),
            ...\Insurance\InsuranceSubmodule::routes(),
            ...\Wards\WardsSubmodule::routes(),
            ...\Theatre\TheatreSubmodule::routes(),
            ...\Maternity\MaternitySubmodule::routes(),
            ...\Dental\DentalSubmodule::routes(),
            ...\Physiotherapy\PhysiotherapySubmodule::routes(),
            ...\Administration\AdministrationSubmodule::routes(),
        );
    }
}
