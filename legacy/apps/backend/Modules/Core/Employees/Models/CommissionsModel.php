<?php

namespace App\Backend\Modules\Core\Employees\Models;

use App\Backend\Models\BaseModel;

class CommissionsModel extends BaseModel
{
    protected string $table = 'employees_commissions';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
