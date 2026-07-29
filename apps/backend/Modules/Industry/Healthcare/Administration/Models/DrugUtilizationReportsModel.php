<?php

namespace App\Backend\Modules\Industry\Healthcare\Administration\Models;

use App\Backend\Models\BaseModel;

class DrugUtilizationReportsModel extends BaseModel
{
    protected string $table = 'healthcare_administration_drug_utilization_reports';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
