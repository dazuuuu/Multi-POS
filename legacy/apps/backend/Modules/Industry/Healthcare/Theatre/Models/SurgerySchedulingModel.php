<?php

namespace App\Backend\Modules\Industry\Healthcare\Theatre\Models;

use App\Backend\Models\BaseModel;

class SurgerySchedulingModel extends BaseModel
{
    protected string $table = 'healthcare_theatre_surgery_scheduling';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
