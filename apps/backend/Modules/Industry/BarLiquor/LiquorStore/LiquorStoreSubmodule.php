<?php

namespace App\Backend\Modules\Industry\BarLiquor\LiquorStore;

class LiquorStoreSubmodule
{
    public const MODULE_KEY = 'bar_liquor';
    public const SUBMODULE_KEY = 'liquor_store';

    public static function features(): array
    {
        return [            'bottle_barcode',
            'case_management',
            'alcohol_licensing_records',
            'supplier_batches',
            'expiry_tracking',
        ];
    }

    public static function routes(): array
    {
        return [            'GET /api/modules/bar_liquor/liquor_store/bottle_barcode' => [Controllers\BottleBarcodeController::class, 'index'],
            'POST /api/modules/bar_liquor/liquor_store/bottle_barcode' => [Controllers\BottleBarcodeController::class, 'store'],
            'GET /api/modules/bar_liquor/liquor_store/bottle_barcode/{id}' => [Controllers\BottleBarcodeController::class, 'show'],
            'PUT /api/modules/bar_liquor/liquor_store/bottle_barcode/{id}' => [Controllers\BottleBarcodeController::class, 'update'],
            'DELETE /api/modules/bar_liquor/liquor_store/bottle_barcode/{id}' => [Controllers\BottleBarcodeController::class, 'destroy'],
            'GET /api/modules/bar_liquor/liquor_store/case_management' => [Controllers\CaseManagementController::class, 'index'],
            'POST /api/modules/bar_liquor/liquor_store/case_management' => [Controllers\CaseManagementController::class, 'store'],
            'GET /api/modules/bar_liquor/liquor_store/case_management/{id}' => [Controllers\CaseManagementController::class, 'show'],
            'PUT /api/modules/bar_liquor/liquor_store/case_management/{id}' => [Controllers\CaseManagementController::class, 'update'],
            'DELETE /api/modules/bar_liquor/liquor_store/case_management/{id}' => [Controllers\CaseManagementController::class, 'destroy'],
            'GET /api/modules/bar_liquor/liquor_store/alcohol_licensing_records' => [Controllers\AlcoholLicensingRecordsController::class, 'index'],
            'POST /api/modules/bar_liquor/liquor_store/alcohol_licensing_records' => [Controllers\AlcoholLicensingRecordsController::class, 'store'],
            'GET /api/modules/bar_liquor/liquor_store/alcohol_licensing_records/{id}' => [Controllers\AlcoholLicensingRecordsController::class, 'show'],
            'PUT /api/modules/bar_liquor/liquor_store/alcohol_licensing_records/{id}' => [Controllers\AlcoholLicensingRecordsController::class, 'update'],
            'DELETE /api/modules/bar_liquor/liquor_store/alcohol_licensing_records/{id}' => [Controllers\AlcoholLicensingRecordsController::class, 'destroy'],
            'GET /api/modules/bar_liquor/liquor_store/supplier_batches' => [Controllers\SupplierBatchesController::class, 'index'],
            'POST /api/modules/bar_liquor/liquor_store/supplier_batches' => [Controllers\SupplierBatchesController::class, 'store'],
            'GET /api/modules/bar_liquor/liquor_store/supplier_batches/{id}' => [Controllers\SupplierBatchesController::class, 'show'],
            'PUT /api/modules/bar_liquor/liquor_store/supplier_batches/{id}' => [Controllers\SupplierBatchesController::class, 'update'],
            'DELETE /api/modules/bar_liquor/liquor_store/supplier_batches/{id}' => [Controllers\SupplierBatchesController::class, 'destroy'],
            'GET /api/modules/bar_liquor/liquor_store/expiry_tracking' => [Controllers\ExpiryTrackingController::class, 'index'],
            'POST /api/modules/bar_liquor/liquor_store/expiry_tracking' => [Controllers\ExpiryTrackingController::class, 'store'],
            'GET /api/modules/bar_liquor/liquor_store/expiry_tracking/{id}' => [Controllers\ExpiryTrackingController::class, 'show'],
            'PUT /api/modules/bar_liquor/liquor_store/expiry_tracking/{id}' => [Controllers\ExpiryTrackingController::class, 'update'],
            'DELETE /api/modules/bar_liquor/liquor_store/expiry_tracking/{id}' => [Controllers\ExpiryTrackingController::class, 'destroy'],
        ];
    }
}
