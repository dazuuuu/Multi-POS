<?php

namespace App\Backend\Modules\Industry\Healthcare\Radiology\Models;

use App\Backend\Models\BaseModel;

class XrayModel extends BaseModel
{
    protected string $table = 'healthcare_radiology_xray';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
