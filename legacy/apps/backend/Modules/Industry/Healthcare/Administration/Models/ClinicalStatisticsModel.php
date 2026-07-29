<?php

namespace App\Backend\Modules\Industry\Healthcare\Administration\Models;

use App\Backend\Models\BaseModel;

class ClinicalStatisticsModel extends BaseModel
{
    protected string $table = 'healthcare_administration_clinical_statistics';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
