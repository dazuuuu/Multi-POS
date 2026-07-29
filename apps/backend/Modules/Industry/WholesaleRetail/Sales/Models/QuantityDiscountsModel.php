<?php

namespace App\Backend\Modules\Industry\WholesaleRetail\Sales\Models;

use App\Backend\Models\BaseModel;

class QuantityDiscountsModel extends BaseModel
{
    protected string $table = 'wholesale_retail_sales_quantity_discounts';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
