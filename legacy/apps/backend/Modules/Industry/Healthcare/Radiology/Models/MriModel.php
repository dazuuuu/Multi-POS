<?php

namespace App\Backend\Modules\Industry\Healthcare\Radiology\Models;

use App\Backend\Models\BaseModel;

class MriModel extends BaseModel
{
    protected string $table = 'healthcare_radiology_mri';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
