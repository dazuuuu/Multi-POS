<?php

namespace App\Backend\Modules\Industry\Healthcare\Nursing\Models;

use App\Backend\Models\BaseModel;

class WardObservationsModel extends BaseModel
{
    protected string $table = 'healthcare_nursing_ward_observations';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
