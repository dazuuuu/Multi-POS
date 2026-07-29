<?php

namespace App\Backend\Modules\Industry\Healthcare\Theatre\Models;

use App\Backend\Models\BaseModel;

class TheatreUtilizationModel extends BaseModel
{
    protected string $table = 'healthcare_theatre_theatre_utilization';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
