<?php

namespace App\Backend\Modules\Core\Employees\Models;

use App\Backend\Models\BaseModel;

class PerformanceTrackingModel extends BaseModel
{
    protected string $table = 'employees_performance_tracking';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
