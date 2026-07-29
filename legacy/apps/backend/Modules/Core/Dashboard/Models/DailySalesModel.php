<?php

namespace App\Backend\Modules\Core\Dashboard\Models;

use App\Backend\Models\BaseModel;

class DailySalesModel extends BaseModel
{
    protected string $table = 'dashboard_daily_sales';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
