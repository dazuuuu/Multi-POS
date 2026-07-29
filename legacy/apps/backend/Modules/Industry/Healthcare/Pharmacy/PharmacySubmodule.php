<?php

namespace App\Backend\Modules\Industry\Healthcare\Pharmacy;

class PharmacySubmodule
{
    public const MODULE_KEY = 'healthcare';
    public const SUBMODULE_KEY = 'pharmacy';

    public static function features(): array
    {
        return [            'drug_inventory',
            'prescription_dispensing',
            'otc_sales',
            'controlled_drugs_register',
            'batch_numbers',
            'expiry_tracking',
            'drug_interactions',
            'generic_substitutions',
            'stock_reordering',
            'multi_store_pharmacy_inventory',
        ];
    }

    public static function routes(): array
    {
        return [            'GET /api/modules/healthcare/pharmacy/drug_inventory' => [Controllers\DrugInventoryController::class, 'index'],
            'POST /api/modules/healthcare/pharmacy/drug_inventory' => [Controllers\DrugInventoryController::class, 'store'],
            'GET /api/modules/healthcare/pharmacy/drug_inventory/{id}' => [Controllers\DrugInventoryController::class, 'show'],
            'PUT /api/modules/healthcare/pharmacy/drug_inventory/{id}' => [Controllers\DrugInventoryController::class, 'update'],
            'DELETE /api/modules/healthcare/pharmacy/drug_inventory/{id}' => [Controllers\DrugInventoryController::class, 'destroy'],
            'GET /api/modules/healthcare/pharmacy/prescription_dispensing' => [Controllers\PrescriptionDispensingController::class, 'index'],
            'POST /api/modules/healthcare/pharmacy/prescription_dispensing' => [Controllers\PrescriptionDispensingController::class, 'store'],
            'GET /api/modules/healthcare/pharmacy/prescription_dispensing/{id}' => [Controllers\PrescriptionDispensingController::class, 'show'],
            'PUT /api/modules/healthcare/pharmacy/prescription_dispensing/{id}' => [Controllers\PrescriptionDispensingController::class, 'update'],
            'DELETE /api/modules/healthcare/pharmacy/prescription_dispensing/{id}' => [Controllers\PrescriptionDispensingController::class, 'destroy'],
            'GET /api/modules/healthcare/pharmacy/otc_sales' => [Controllers\OtcSalesController::class, 'index'],
            'POST /api/modules/healthcare/pharmacy/otc_sales' => [Controllers\OtcSalesController::class, 'store'],
            'GET /api/modules/healthcare/pharmacy/otc_sales/{id}' => [Controllers\OtcSalesController::class, 'show'],
            'PUT /api/modules/healthcare/pharmacy/otc_sales/{id}' => [Controllers\OtcSalesController::class, 'update'],
            'DELETE /api/modules/healthcare/pharmacy/otc_sales/{id}' => [Controllers\OtcSalesController::class, 'destroy'],
            'GET /api/modules/healthcare/pharmacy/controlled_drugs_register' => [Controllers\ControlledDrugsRegisterController::class, 'index'],
            'POST /api/modules/healthcare/pharmacy/controlled_drugs_register' => [Controllers\ControlledDrugsRegisterController::class, 'store'],
            'GET /api/modules/healthcare/pharmacy/controlled_drugs_register/{id}' => [Controllers\ControlledDrugsRegisterController::class, 'show'],
            'PUT /api/modules/healthcare/pharmacy/controlled_drugs_register/{id}' => [Controllers\ControlledDrugsRegisterController::class, 'update'],
            'DELETE /api/modules/healthcare/pharmacy/controlled_drugs_register/{id}' => [Controllers\ControlledDrugsRegisterController::class, 'destroy'],
            'GET /api/modules/healthcare/pharmacy/batch_numbers' => [Controllers\BatchNumbersController::class, 'index'],
            'POST /api/modules/healthcare/pharmacy/batch_numbers' => [Controllers\BatchNumbersController::class, 'store'],
            'GET /api/modules/healthcare/pharmacy/batch_numbers/{id}' => [Controllers\BatchNumbersController::class, 'show'],
            'PUT /api/modules/healthcare/pharmacy/batch_numbers/{id}' => [Controllers\BatchNumbersController::class, 'update'],
            'DELETE /api/modules/healthcare/pharmacy/batch_numbers/{id}' => [Controllers\BatchNumbersController::class, 'destroy'],
            'GET /api/modules/healthcare/pharmacy/expiry_tracking' => [Controllers\ExpiryTrackingController::class, 'index'],
            'POST /api/modules/healthcare/pharmacy/expiry_tracking' => [Controllers\ExpiryTrackingController::class, 'store'],
            'GET /api/modules/healthcare/pharmacy/expiry_tracking/{id}' => [Controllers\ExpiryTrackingController::class, 'show'],
            'PUT /api/modules/healthcare/pharmacy/expiry_tracking/{id}' => [Controllers\ExpiryTrackingController::class, 'update'],
            'DELETE /api/modules/healthcare/pharmacy/expiry_tracking/{id}' => [Controllers\ExpiryTrackingController::class, 'destroy'],
            'GET /api/modules/healthcare/pharmacy/drug_interactions' => [Controllers\DrugInteractionsController::class, 'index'],
            'POST /api/modules/healthcare/pharmacy/drug_interactions' => [Controllers\DrugInteractionsController::class, 'store'],
            'GET /api/modules/healthcare/pharmacy/drug_interactions/{id}' => [Controllers\DrugInteractionsController::class, 'show'],
            'PUT /api/modules/healthcare/pharmacy/drug_interactions/{id}' => [Controllers\DrugInteractionsController::class, 'update'],
            'DELETE /api/modules/healthcare/pharmacy/drug_interactions/{id}' => [Controllers\DrugInteractionsController::class, 'destroy'],
            'GET /api/modules/healthcare/pharmacy/generic_substitutions' => [Controllers\GenericSubstitutionsController::class, 'index'],
            'POST /api/modules/healthcare/pharmacy/generic_substitutions' => [Controllers\GenericSubstitutionsController::class, 'store'],
            'GET /api/modules/healthcare/pharmacy/generic_substitutions/{id}' => [Controllers\GenericSubstitutionsController::class, 'show'],
            'PUT /api/modules/healthcare/pharmacy/generic_substitutions/{id}' => [Controllers\GenericSubstitutionsController::class, 'update'],
            'DELETE /api/modules/healthcare/pharmacy/generic_substitutions/{id}' => [Controllers\GenericSubstitutionsController::class, 'destroy'],
            'GET /api/modules/healthcare/pharmacy/stock_reordering' => [Controllers\StockReorderingController::class, 'index'],
            'POST /api/modules/healthcare/pharmacy/stock_reordering' => [Controllers\StockReorderingController::class, 'store'],
            'GET /api/modules/healthcare/pharmacy/stock_reordering/{id}' => [Controllers\StockReorderingController::class, 'show'],
            'PUT /api/modules/healthcare/pharmacy/stock_reordering/{id}' => [Controllers\StockReorderingController::class, 'update'],
            'DELETE /api/modules/healthcare/pharmacy/stock_reordering/{id}' => [Controllers\StockReorderingController::class, 'destroy'],
            'GET /api/modules/healthcare/pharmacy/multi_store_pharmacy_inventory' => [Controllers\MultiStorePharmacyInventoryController::class, 'index'],
            'POST /api/modules/healthcare/pharmacy/multi_store_pharmacy_inventory' => [Controllers\MultiStorePharmacyInventoryController::class, 'store'],
            'GET /api/modules/healthcare/pharmacy/multi_store_pharmacy_inventory/{id}' => [Controllers\MultiStorePharmacyInventoryController::class, 'show'],
            'PUT /api/modules/healthcare/pharmacy/multi_store_pharmacy_inventory/{id}' => [Controllers\MultiStorePharmacyInventoryController::class, 'update'],
            'DELETE /api/modules/healthcare/pharmacy/multi_store_pharmacy_inventory/{id}' => [Controllers\MultiStorePharmacyInventoryController::class, 'destroy'],
        ];
    }
}
