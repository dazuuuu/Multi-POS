<?php

namespace App\Backend\Modules\Industry\Healthcare\Radiology;

class RadiologySubmodule
{
    public const MODULE_KEY = 'healthcare';
    public const SUBMODULE_KEY = 'radiology';

    public static function features(): array
    {
        return [            'imaging_requests',
            'xray',
            'ct_scan',
            'mri',
            'ultrasound',
            'image_attachments',
            'radiologist_reports',
        ];
    }

    public static function routes(): array
    {
        return [            'GET /api/modules/healthcare/radiology/imaging_requests' => [Controllers\ImagingRequestsController::class, 'index'],
            'POST /api/modules/healthcare/radiology/imaging_requests' => [Controllers\ImagingRequestsController::class, 'store'],
            'GET /api/modules/healthcare/radiology/imaging_requests/{id}' => [Controllers\ImagingRequestsController::class, 'show'],
            'PUT /api/modules/healthcare/radiology/imaging_requests/{id}' => [Controllers\ImagingRequestsController::class, 'update'],
            'DELETE /api/modules/healthcare/radiology/imaging_requests/{id}' => [Controllers\ImagingRequestsController::class, 'destroy'],
            'GET /api/modules/healthcare/radiology/xray' => [Controllers\XrayController::class, 'index'],
            'POST /api/modules/healthcare/radiology/xray' => [Controllers\XrayController::class, 'store'],
            'GET /api/modules/healthcare/radiology/xray/{id}' => [Controllers\XrayController::class, 'show'],
            'PUT /api/modules/healthcare/radiology/xray/{id}' => [Controllers\XrayController::class, 'update'],
            'DELETE /api/modules/healthcare/radiology/xray/{id}' => [Controllers\XrayController::class, 'destroy'],
            'GET /api/modules/healthcare/radiology/ct_scan' => [Controllers\CtScanController::class, 'index'],
            'POST /api/modules/healthcare/radiology/ct_scan' => [Controllers\CtScanController::class, 'store'],
            'GET /api/modules/healthcare/radiology/ct_scan/{id}' => [Controllers\CtScanController::class, 'show'],
            'PUT /api/modules/healthcare/radiology/ct_scan/{id}' => [Controllers\CtScanController::class, 'update'],
            'DELETE /api/modules/healthcare/radiology/ct_scan/{id}' => [Controllers\CtScanController::class, 'destroy'],
            'GET /api/modules/healthcare/radiology/mri' => [Controllers\MriController::class, 'index'],
            'POST /api/modules/healthcare/radiology/mri' => [Controllers\MriController::class, 'store'],
            'GET /api/modules/healthcare/radiology/mri/{id}' => [Controllers\MriController::class, 'show'],
            'PUT /api/modules/healthcare/radiology/mri/{id}' => [Controllers\MriController::class, 'update'],
            'DELETE /api/modules/healthcare/radiology/mri/{id}' => [Controllers\MriController::class, 'destroy'],
            'GET /api/modules/healthcare/radiology/ultrasound' => [Controllers\UltrasoundController::class, 'index'],
            'POST /api/modules/healthcare/radiology/ultrasound' => [Controllers\UltrasoundController::class, 'store'],
            'GET /api/modules/healthcare/radiology/ultrasound/{id}' => [Controllers\UltrasoundController::class, 'show'],
            'PUT /api/modules/healthcare/radiology/ultrasound/{id}' => [Controllers\UltrasoundController::class, 'update'],
            'DELETE /api/modules/healthcare/radiology/ultrasound/{id}' => [Controllers\UltrasoundController::class, 'destroy'],
            'GET /api/modules/healthcare/radiology/image_attachments' => [Controllers\ImageAttachmentsController::class, 'index'],
            'POST /api/modules/healthcare/radiology/image_attachments' => [Controllers\ImageAttachmentsController::class, 'store'],
            'GET /api/modules/healthcare/radiology/image_attachments/{id}' => [Controllers\ImageAttachmentsController::class, 'show'],
            'PUT /api/modules/healthcare/radiology/image_attachments/{id}' => [Controllers\ImageAttachmentsController::class, 'update'],
            'DELETE /api/modules/healthcare/radiology/image_attachments/{id}' => [Controllers\ImageAttachmentsController::class, 'destroy'],
            'GET /api/modules/healthcare/radiology/radiologist_reports' => [Controllers\RadiologistReportsController::class, 'index'],
            'POST /api/modules/healthcare/radiology/radiologist_reports' => [Controllers\RadiologistReportsController::class, 'store'],
            'GET /api/modules/healthcare/radiology/radiologist_reports/{id}' => [Controllers\RadiologistReportsController::class, 'show'],
            'PUT /api/modules/healthcare/radiology/radiologist_reports/{id}' => [Controllers\RadiologistReportsController::class, 'update'],
            'DELETE /api/modules/healthcare/radiology/radiologist_reports/{id}' => [Controllers\RadiologistReportsController::class, 'destroy'],
        ];
    }
}
