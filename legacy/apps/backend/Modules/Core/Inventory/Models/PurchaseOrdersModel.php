<?php

namespace App\Backend\Modules\Core\Inventory\Models;

use App\Backend\Models\BaseModel;

class PurchaseOrdersModel extends BaseModel
{
    protected string $table = 'inventory_purchase_orders';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
