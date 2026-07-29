<?php

namespace App\Backend\Modules\Industry\Healthcare\Laboratory;

class LaboratorySubmodule
{
    public const MODULE_KEY = 'healthcare';
    public const SUBMODULE_KEY = 'laboratory';

    public static function features(): array
    {
        return [            'lab_requests',
            'sample_collection',
            'barcode_labels',
            'test_workflow',
            'results_entry',
            'result_verification',
            'printable_reports',
            'reference_ranges',
            'critical_value_alerts',
            'external_lab_integration',
        ];
    }

    public static function routes(): array
    {
        return [            'GET /api/modules/healthcare/laboratory/lab_requests' => [Controllers\LabRequestsController::class, 'index'],
            'POST /api/modules/healthcare/laboratory/lab_requests' => [Controllers\LabRequestsController::class, 'store'],
            'GET /api/modules/healthcare/laboratory/lab_requests/{id}' => [Controllers\LabRequestsController::class, 'show'],
            'PUT /api/modules/healthcare/laboratory/lab_requests/{id}' => [Controllers\LabRequestsController::class, 'update'],
            'DELETE /api/modules/healthcare/laboratory/lab_requests/{id}' => [Controllers\LabRequestsController::class, 'destroy'],
            'GET /api/modules/healthcare/laboratory/sample_collection' => [Controllers\SampleCollectionController::class, 'index'],
            'POST /api/modules/healthcare/laboratory/sample_collection' => [Controllers\SampleCollectionController::class, 'store'],
            'GET /api/modules/healthcare/laboratory/sample_collection/{id}' => [Controllers\SampleCollectionController::class, 'show'],
            'PUT /api/modules/healthcare/laboratory/sample_collection/{id}' => [Controllers\SampleCollectionController::class, 'update'],
            'DELETE /api/modules/healthcare/laboratory/sample_collection/{id}' => [Controllers\SampleCollectionController::class, 'destroy'],
            'GET /api/modules/healthcare/laboratory/barcode_labels' => [Controllers\BarcodeLabelsController::class, 'index'],
            'POST /api/modules/healthcare/laboratory/barcode_labels' => [Controllers\BarcodeLabelsController::class, 'store'],
            'GET /api/modules/healthcare/laboratory/barcode_labels/{id}' => [Controllers\BarcodeLabelsController::class, 'show'],
            'PUT /api/modules/healthcare/laboratory/barcode_labels/{id}' => [Controllers\BarcodeLabelsController::class, 'update'],
            'DELETE /api/modules/healthcare/laboratory/barcode_labels/{id}' => [Controllers\BarcodeLabelsController::class, 'destroy'],
            'GET /api/modules/healthcare/laboratory/test_workflow' => [Controllers\TestWorkflowController::class, 'index'],
            'POST /api/modules/healthcare/laboratory/test_workflow' => [Controllers\TestWorkflowController::class, 'store'],
            'GET /api/modules/healthcare/laboratory/test_workflow/{id}' => [Controllers\TestWorkflowController::class, 'show'],
            'PUT /api/modules/healthcare/laboratory/test_workflow/{id}' => [Controllers\TestWorkflowController::class, 'update'],
            'DELETE /api/modules/healthcare/laboratory/test_workflow/{id}' => [Controllers\TestWorkflowController::class, 'destroy'],
            'GET /api/modules/healthcare/laboratory/results_entry' => [Controllers\ResultsEntryController::class, 'index'],
            'POST /api/modules/healthcare/laboratory/results_entry' => [Controllers\ResultsEntryController::class, 'store'],
            'GET /api/modules/healthcare/laboratory/results_entry/{id}' => [Controllers\ResultsEntryController::class, 'show'],
            'PUT /api/modules/healthcare/laboratory/results_entry/{id}' => [Controllers\ResultsEntryController::class, 'update'],
            'DELETE /api/modules/healthcare/laboratory/results_entry/{id}' => [Controllers\ResultsEntryController::class, 'destroy'],
            'GET /api/modules/healthcare/laboratory/result_verification' => [Controllers\ResultVerificationController::class, 'index'],
            'POST /api/modules/healthcare/laboratory/result_verification' => [Controllers\ResultVerificationController::class, 'store'],
            'GET /api/modules/healthcare/laboratory/result_verification/{id}' => [Controllers\ResultVerificationController::class, 'show'],
            'PUT /api/modules/healthcare/laboratory/result_verification/{id}' => [Controllers\ResultVerificationController::class, 'update'],
            'DELETE /api/modules/healthcare/laboratory/result_verification/{id}' => [Controllers\ResultVerificationController::class, 'destroy'],
            'GET /api/modules/healthcare/laboratory/printable_reports' => [Controllers\PrintableReportsController::class, 'index'],
            'POST /api/modules/healthcare/laboratory/printable_reports' => [Controllers\PrintableReportsController::class, 'store'],
            'GET /api/modules/healthcare/laboratory/printable_reports/{id}' => [Controllers\PrintableReportsController::class, 'show'],
            'PUT /api/modules/healthcare/laboratory/printable_reports/{id}' => [Controllers\PrintableReportsController::class, 'update'],
            'DELETE /api/modules/healthcare/laboratory/printable_reports/{id}' => [Controllers\PrintableReportsController::class, 'destroy'],
            'GET /api/modules/healthcare/laboratory/reference_ranges' => [Controllers\ReferenceRangesController::class, 'index'],
            'POST /api/modules/healthcare/laboratory/reference_ranges' => [Controllers\ReferenceRangesController::class, 'store'],
            'GET /api/modules/healthcare/laboratory/reference_ranges/{id}' => [Controllers\ReferenceRangesController::class, 'show'],
            'PUT /api/modules/healthcare/laboratory/reference_ranges/{id}' => [Controllers\ReferenceRangesController::class, 'update'],
            'DELETE /api/modules/healthcare/laboratory/reference_ranges/{id}' => [Controllers\ReferenceRangesController::class, 'destroy'],
            'GET /api/modules/healthcare/laboratory/critical_value_alerts' => [Controllers\CriticalValueAlertsController::class, 'index'],
            'POST /api/modules/healthcare/laboratory/critical_value_alerts' => [Controllers\CriticalValueAlertsController::class, 'store'],
            'GET /api/modules/healthcare/laboratory/critical_value_alerts/{id}' => [Controllers\CriticalValueAlertsController::class, 'show'],
            'PUT /api/modules/healthcare/laboratory/critical_value_alerts/{id}' => [Controllers\CriticalValueAlertsController::class, 'update'],
            'DELETE /api/modules/healthcare/laboratory/critical_value_alerts/{id}' => [Controllers\CriticalValueAlertsController::class, 'destroy'],
            'GET /api/modules/healthcare/laboratory/external_lab_integration' => [Controllers\ExternalLabIntegrationController::class, 'index'],
            'POST /api/modules/healthcare/laboratory/external_lab_integration' => [Controllers\ExternalLabIntegrationController::class, 'store'],
            'GET /api/modules/healthcare/laboratory/external_lab_integration/{id}' => [Controllers\ExternalLabIntegrationController::class, 'show'],
            'PUT /api/modules/healthcare/laboratory/external_lab_integration/{id}' => [Controllers\ExternalLabIntegrationController::class, 'update'],
            'DELETE /api/modules/healthcare/laboratory/external_lab_integration/{id}' => [Controllers\ExternalLabIntegrationController::class, 'destroy'],
        ];
    }
}
