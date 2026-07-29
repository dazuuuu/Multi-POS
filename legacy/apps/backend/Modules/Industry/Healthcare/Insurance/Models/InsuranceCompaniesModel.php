<?php

namespace App\Backend\Modules\Industry\Healthcare\Insurance\Models;

use App\Backend\Models\BaseModel;

class InsuranceCompaniesModel extends BaseModel
{
    protected string $table = 'healthcare_insurance_insurance_companies';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
