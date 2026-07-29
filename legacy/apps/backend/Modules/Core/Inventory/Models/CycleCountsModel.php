<?php

namespace App\Backend\Modules\Core\Inventory\Models;

use App\Backend\Models\BaseModel;

class CycleCountsModel extends BaseModel
{
    protected string $table = 'inventory_cycle_counts';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
