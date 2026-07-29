<?php

namespace App\Backend\Modules\Industry\Healthcare\Administration;

class AdministrationSubmodule
{
    public const MODULE_KEY = 'healthcare';
    public const SUBMODULE_KEY = 'administration';

    public static function features(): array
    {
        return [            'medical_reports',
            'clinical_statistics',
            'ministry_of_health_reports',
            'drug_utilization_reports',
            'disease_surveillance_dashboards',
        ];
    }

    public static function routes(): array
    {
        return [            'GET /api/modules/healthcare/administration/medical_reports' => [Controllers\MedicalReportsController::class, 'index'],
            'POST /api/modules/healthcare/administration/medical_reports' => [Controllers\MedicalReportsController::class, 'store'],
            'GET /api/modules/healthcare/administration/medical_reports/{id}' => [Controllers\MedicalReportsController::class, 'show'],
            'PUT /api/modules/healthcare/administration/medical_reports/{id}' => [Controllers\MedicalReportsController::class, 'update'],
            'DELETE /api/modules/healthcare/administration/medical_reports/{id}' => [Controllers\MedicalReportsController::class, 'destroy'],
            'GET /api/modules/healthcare/administration/clinical_statistics' => [Controllers\ClinicalStatisticsController::class, 'index'],
            'POST /api/modules/healthcare/administration/clinical_statistics' => [Controllers\ClinicalStatisticsController::class, 'store'],
            'GET /api/modules/healthcare/administration/clinical_statistics/{id}' => [Controllers\ClinicalStatisticsController::class, 'show'],
            'PUT /api/modules/healthcare/administration/clinical_statistics/{id}' => [Controllers\ClinicalStatisticsController::class, 'update'],
            'DELETE /api/modules/healthcare/administration/clinical_statistics/{id}' => [Controllers\ClinicalStatisticsController::class, 'destroy'],
            'GET /api/modules/healthcare/administration/ministry_of_health_reports' => [Controllers\MinistryOfHealthReportsController::class, 'index'],
            'POST /api/modules/healthcare/administration/ministry_of_health_reports' => [Controllers\MinistryOfHealthReportsController::class, 'store'],
            'GET /api/modules/healthcare/administration/ministry_of_health_reports/{id}' => [Controllers\MinistryOfHealthReportsController::class, 'show'],
            'PUT /api/modules/healthcare/administration/ministry_of_health_reports/{id}' => [Controllers\MinistryOfHealthReportsController::class, 'update'],
            'DELETE /api/modules/healthcare/administration/ministry_of_health_reports/{id}' => [Controllers\MinistryOfHealthReportsController::class, 'destroy'],
            'GET /api/modules/healthcare/administration/drug_utilization_reports' => [Controllers\DrugUtilizationReportsController::class, 'index'],
            'POST /api/modules/healthcare/administration/drug_utilization_reports' => [Controllers\DrugUtilizationReportsController::class, 'store'],
            'GET /api/modules/healthcare/administration/drug_utilization_reports/{id}' => [Controllers\DrugUtilizationReportsController::class, 'show'],
            'PUT /api/modules/healthcare/administration/drug_utilization_reports/{id}' => [Controllers\DrugUtilizationReportsController::class, 'update'],
            'DELETE /api/modules/healthcare/administration/drug_utilization_reports/{id}' => [Controllers\DrugUtilizationReportsController::class, 'destroy'],
            'GET /api/modules/healthcare/administration/disease_surveillance_dashboards' => [Controllers\DiseaseSurveillanceDashboardsController::class, 'index'],
            'POST /api/modules/healthcare/administration/disease_surveillance_dashboards' => [Controllers\DiseaseSurveillanceDashboardsController::class, 'store'],
            'GET /api/modules/healthcare/administration/disease_surveillance_dashboards/{id}' => [Controllers\DiseaseSurveillanceDashboardsController::class, 'show'],
            'PUT /api/modules/healthcare/administration/disease_surveillance_dashboards/{id}' => [Controllers\DiseaseSurveillanceDashboardsController::class, 'update'],
            'DELETE /api/modules/healthcare/administration/disease_surveillance_dashboards/{id}' => [Controllers\DiseaseSurveillanceDashboardsController::class, 'destroy'],
        ];
    }
}
