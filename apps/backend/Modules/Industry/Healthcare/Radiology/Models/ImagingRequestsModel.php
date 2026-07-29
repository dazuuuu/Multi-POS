<?php

namespace App\Backend\Modules\Industry\Healthcare\Radiology\Models;

use App\Backend\Models\BaseModel;

class ImagingRequestsModel extends BaseModel
{
    protected string $table = 'healthcare_radiology_imaging_requests';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
