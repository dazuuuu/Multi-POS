<?php

namespace App\Backend\Modules\Core\Dashboard\Models;

use App\Backend\Models\BaseModel;

class TopSellingProductsModel extends BaseModel
{
    protected string $table = 'dashboard_top_selling_products';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
