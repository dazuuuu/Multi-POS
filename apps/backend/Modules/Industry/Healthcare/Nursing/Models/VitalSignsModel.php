<?php

namespace App\Backend\Modules\Industry\Healthcare\Nursing\Models;

use App\Backend\Models\BaseModel;

class VitalSignsModel extends BaseModel
{
    protected string $table = 'healthcare_nursing_vital_signs';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
