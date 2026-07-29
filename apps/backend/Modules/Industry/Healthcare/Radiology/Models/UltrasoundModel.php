<?php

namespace App\Backend\Modules\Industry\Healthcare\Radiology\Models;

use App\Backend\Models\BaseModel;

class UltrasoundModel extends BaseModel
{
    protected string $table = 'healthcare_radiology_ultrasound';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
