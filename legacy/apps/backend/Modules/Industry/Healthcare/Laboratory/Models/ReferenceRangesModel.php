<?php

namespace App\Backend\Modules\Industry\Healthcare\Laboratory\Models;

use App\Backend\Models\BaseModel;

class ReferenceRangesModel extends BaseModel
{
    protected string $table = 'healthcare_laboratory_reference_ranges';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
