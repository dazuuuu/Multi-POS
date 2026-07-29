<?php

namespace App\Backend\Modules\Core\Inventory\Models;

use App\Backend\Models\BaseModel;

class StockAdjustmentsModel extends BaseModel
{
    protected string $table = 'inventory_stock_adjustments';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
