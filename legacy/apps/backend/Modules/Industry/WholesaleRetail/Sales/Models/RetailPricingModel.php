<?php

namespace App\Backend\Modules\Industry\WholesaleRetail\Sales\Models;

use App\Backend\Models\BaseModel;

class RetailPricingModel extends BaseModel
{
    protected string $table = 'wholesale_retail_sales_retail_pricing';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
