<?php

namespace App\Backend\Modules\Core\BusinessManagement;

class BusinessManagementModule
{
    public const MODULE_KEY = 'business_management';

    public static function features(): array
    {
        return [
            'business_registration',
            'company_profile',
            'business_logo_branding',
            'multiple_businesses',
            'tax_configuration',
            'currency_settings',
            'timezone_settings',
            'operating_hours',
        ];
    }

    public static function routes(): array
    {
        return [
            'GET /api/modules/business_management/business_registration' => [Controllers\BusinessRegistrationController::class, 'index'],
            'POST /api/modules/business_management/business_registration' => [Controllers\BusinessRegistrationController::class, 'store'],
            'GET /api/modules/business_management/business_registration/{id}' => [Controllers\BusinessRegistrationController::class, 'show'],
            'PUT /api/modules/business_management/business_registration/{id}' => [Controllers\BusinessRegistrationController::class, 'update'],
            'DELETE /api/modules/business_management/business_registration/{id}' => [Controllers\BusinessRegistrationController::class, 'destroy'],
            'GET /api/modules/business_management/company_profile' => [Controllers\CompanyProfileController::class, 'index'],
            'POST /api/modules/business_management/company_profile' => [Controllers\CompanyProfileController::class, 'store'],
            'GET /api/modules/business_management/company_profile/{id}' => [Controllers\CompanyProfileController::class, 'show'],
            'PUT /api/modules/business_management/company_profile/{id}' => [Controllers\CompanyProfileController::class, 'update'],
            'DELETE /api/modules/business_management/company_profile/{id}' => [Controllers\CompanyProfileController::class, 'destroy'],
            'GET /api/modules/business_management/business_logo_branding' => [Controllers\BusinessLogoBrandingController::class, 'index'],
            'POST /api/modules/business_management/business_logo_branding' => [Controllers\BusinessLogoBrandingController::class, 'store'],
            'GET /api/modules/business_management/business_logo_branding/{id}' => [Controllers\BusinessLogoBrandingController::class, 'show'],
            'PUT /api/modules/business_management/business_logo_branding/{id}' => [Controllers\BusinessLogoBrandingController::class, 'update'],
            'DELETE /api/modules/business_management/business_logo_branding/{id}' => [Controllers\BusinessLogoBrandingController::class, 'destroy'],
            'GET /api/modules/business_management/multiple_businesses' => [Controllers\MultipleBusinessesController::class, 'index'],
            'POST /api/modules/business_management/multiple_businesses' => [Controllers\MultipleBusinessesController::class, 'store'],
            'GET /api/modules/business_management/multiple_businesses/{id}' => [Controllers\MultipleBusinessesController::class, 'show'],
            'PUT /api/modules/business_management/multiple_businesses/{id}' => [Controllers\MultipleBusinessesController::class, 'update'],
            'DELETE /api/modules/business_management/multiple_businesses/{id}' => [Controllers\MultipleBusinessesController::class, 'destroy'],
            'GET /api/modules/business_management/tax_configuration' => [Controllers\TaxConfigurationController::class, 'index'],
            'POST /api/modules/business_management/tax_configuration' => [Controllers\TaxConfigurationController::class, 'store'],
            'GET /api/modules/business_management/tax_configuration/{id}' => [Controllers\TaxConfigurationController::class, 'show'],
            'PUT /api/modules/business_management/tax_configuration/{id}' => [Controllers\TaxConfigurationController::class, 'update'],
            'DELETE /api/modules/business_management/tax_configuration/{id}' => [Controllers\TaxConfigurationController::class, 'destroy'],
            'GET /api/modules/business_management/currency_settings' => [Controllers\CurrencySettingsController::class, 'index'],
            'POST /api/modules/business_management/currency_settings' => [Controllers\CurrencySettingsController::class, 'store'],
            'GET /api/modules/business_management/currency_settings/{id}' => [Controllers\CurrencySettingsController::class, 'show'],
            'PUT /api/modules/business_management/currency_settings/{id}' => [Controllers\CurrencySettingsController::class, 'update'],
            'DELETE /api/modules/business_management/currency_settings/{id}' => [Controllers\CurrencySettingsController::class, 'destroy'],
            'GET /api/modules/business_management/timezone_settings' => [Controllers\TimezoneSettingsController::class, 'index'],
            'POST /api/modules/business_management/timezone_settings' => [Controllers\TimezoneSettingsController::class, 'store'],
            'GET /api/modules/business_management/timezone_settings/{id}' => [Controllers\TimezoneSettingsController::class, 'show'],
            'PUT /api/modules/business_management/timezone_settings/{id}' => [Controllers\TimezoneSettingsController::class, 'update'],
            'DELETE /api/modules/business_management/timezone_settings/{id}' => [Controllers\TimezoneSettingsController::class, 'destroy'],
            'GET /api/modules/business_management/operating_hours' => [Controllers\OperatingHoursController::class, 'index'],
            'POST /api/modules/business_management/operating_hours' => [Controllers\OperatingHoursController::class, 'store'],
            'GET /api/modules/business_management/operating_hours/{id}' => [Controllers\OperatingHoursController::class, 'show'],
            'PUT /api/modules/business_management/operating_hours/{id}' => [Controllers\OperatingHoursController::class, 'update'],
            'DELETE /api/modules/business_management/operating_hours/{id}' => [Controllers\OperatingHoursController::class, 'destroy'],
        ];
    }
}
