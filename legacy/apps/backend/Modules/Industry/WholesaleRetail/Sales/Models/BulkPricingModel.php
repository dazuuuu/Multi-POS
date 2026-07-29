<?php

namespace App\Backend\Modules\Industry\WholesaleRetail\Sales\Models;

use App\Backend\Models\BaseModel;

class BulkPricingModel extends BaseModel
{
    protected string $table = 'wholesale_retail_sales_bulk_pricing';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
