<?php

namespace App\Backend\Modules\Industry\Healthcare\Dental\Models;

use App\Backend\Models\BaseModel;

class XrayRecordsModel extends BaseModel
{
    protected string $table = 'healthcare_dental_xray_records';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
