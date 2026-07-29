<?php

namespace App\Backend\Modules\Core\Inventory\Models;

use App\Backend\Models\BaseModel;

class UnlimitedProductsModel extends BaseModel
{
    protected string $table = 'inventory_unlimited_products';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
