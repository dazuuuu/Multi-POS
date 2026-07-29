<?php

namespace App\Backend\Modules\Industry\Healthcare\Doctor\Models;

use App\Backend\Models\BaseModel;

class PrescriptionsModel extends BaseModel
{
    protected string $table = 'healthcare_doctor_prescriptions';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
