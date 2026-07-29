<?php

namespace App\Backend\Modules\Industry\Healthcare\Emr\Models;

use App\Backend\Models\BaseModel;

class ImmunizationRecordsModel extends BaseModel
{
    protected string $table = 'healthcare_emr_immunization_records';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
