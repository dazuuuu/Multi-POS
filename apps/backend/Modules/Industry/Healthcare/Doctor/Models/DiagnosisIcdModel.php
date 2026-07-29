<?php

namespace App\Backend\Modules\Industry\Healthcare\Doctor\Models;

use App\Backend\Models\BaseModel;

class DiagnosisIcdModel extends BaseModel
{
    protected string $table = 'healthcare_doctor_diagnosis_icd';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
