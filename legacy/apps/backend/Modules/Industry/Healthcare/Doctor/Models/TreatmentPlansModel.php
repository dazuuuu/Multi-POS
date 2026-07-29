<?php

namespace App\Backend\Modules\Industry\Healthcare\Doctor\Models;

use App\Backend\Models\BaseModel;

class TreatmentPlansModel extends BaseModel
{
    protected string $table = 'healthcare_doctor_treatment_plans';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
