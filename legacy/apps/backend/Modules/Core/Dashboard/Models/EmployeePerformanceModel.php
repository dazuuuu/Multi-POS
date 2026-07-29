<?php

namespace App\Backend\Modules\Core\Dashboard\Models;

use App\Backend\Models\BaseModel;

class EmployeePerformanceModel extends BaseModel
{
    protected string $table = 'dashboard_employee_performance';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
