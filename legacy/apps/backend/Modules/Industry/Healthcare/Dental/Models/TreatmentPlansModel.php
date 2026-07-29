<?php

namespace App\Backend\Modules\Industry\Healthcare\Dental\Models;

use App\Backend\Models\BaseModel;

class TreatmentPlansModel extends BaseModel
{
    protected string $table = 'healthcare_dental_treatment_plans';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
