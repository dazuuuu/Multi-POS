<?php

namespace App\Backend\Modules\Core\Reports\Models;

use App\Backend\Models\BaseModel;

class InventoryReportsModel extends BaseModel
{
    protected string $table = 'reports_inventory_reports';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
