<?php

namespace App\Backend\Modules\Core\Employees\Models;

use App\Backend\Models\BaseModel;

class ShiftManagementModel extends BaseModel
{
    protected string $table = 'employees_shift_management';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
