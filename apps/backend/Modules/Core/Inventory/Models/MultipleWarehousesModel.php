<?php

namespace App\Backend\Modules\Core\Inventory\Models;

use App\Backend\Models\BaseModel;

class MultipleWarehousesModel extends BaseModel
{
    protected string $table = 'inventory_multiple_warehouses';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
