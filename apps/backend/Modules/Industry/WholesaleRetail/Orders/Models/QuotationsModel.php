<?php

namespace App\Backend\Modules\Industry\WholesaleRetail\Orders\Models;

use App\Backend\Models\BaseModel;

class QuotationsModel extends BaseModel
{
    protected string $table = 'wholesale_retail_orders_quotations';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
