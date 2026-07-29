<?php

namespace App\Backend\Modules\Core\Employees\Models;

use App\Backend\Models\BaseModel;

class AttendanceModel extends BaseModel
{
    protected string $table = 'employees_attendance';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
