<?php

namespace App\Backend\Modules\Core\Inventory\Models;

use App\Backend\Models\BaseModel;

class StockTransfersModel extends BaseModel
{
    protected string $table = 'inventory_stock_transfers';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
