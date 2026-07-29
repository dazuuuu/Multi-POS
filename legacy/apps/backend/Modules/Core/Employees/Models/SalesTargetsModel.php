<?php

namespace App\Backend\Modules\Core\Employees\Models;

use App\Backend\Models\BaseModel;

class SalesTargetsModel extends BaseModel
{
    protected string $table = 'employees_sales_targets';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
