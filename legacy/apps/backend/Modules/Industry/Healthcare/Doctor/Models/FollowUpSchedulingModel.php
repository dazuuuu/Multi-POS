<?php

namespace App\Backend\Modules\Industry\Healthcare\Doctor\Models;

use App\Backend\Models\BaseModel;

class FollowUpSchedulingModel extends BaseModel
{
    protected string $table = 'healthcare_doctor_follow_up_scheduling';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
