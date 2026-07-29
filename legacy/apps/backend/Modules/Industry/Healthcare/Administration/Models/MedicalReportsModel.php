<?php

namespace App\Backend\Modules\Industry\Healthcare\Administration\Models;

use App\Backend\Models\BaseModel;

class MedicalReportsModel extends BaseModel
{
    protected string $table = 'healthcare_administration_medical_reports';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
