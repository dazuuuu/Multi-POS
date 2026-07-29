<?php

namespace App\Backend\Modules\Industry\Healthcare\Wards\Models;

use App\Backend\Models\BaseModel;

class NursingAssignmentsModel extends BaseModel
{
    protected string $table = 'healthcare_wards_nursing_assignments';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
