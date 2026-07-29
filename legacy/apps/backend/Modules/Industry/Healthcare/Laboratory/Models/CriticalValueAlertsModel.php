<?php

namespace App\Backend\Modules\Industry\Healthcare\Laboratory\Models;

use App\Backend\Models\BaseModel;

class CriticalValueAlertsModel extends BaseModel
{
    protected string $table = 'healthcare_laboratory_critical_value_alerts';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
