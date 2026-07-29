<?php

namespace App\Backend\Modules\Industry\Healthcare\Radiology\Models;

use App\Backend\Models\BaseModel;

class RadiologistReportsModel extends BaseModel
{
    protected string $table = 'healthcare_radiology_radiologist_reports';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
