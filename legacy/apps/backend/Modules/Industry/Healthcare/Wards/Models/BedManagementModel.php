<?php

namespace App\Backend\Modules\Industry\Healthcare\Wards\Models;

use App\Backend\Models\BaseModel;

class BedManagementModel extends BaseModel
{
    protected string $table = 'healthcare_wards_bed_management';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
