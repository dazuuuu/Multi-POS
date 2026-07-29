<?php

namespace App\Backend\Modules\Industry\WholesaleRetail\Logistics\Models;

use App\Backend\Models\BaseModel;

class DispatchModel extends BaseModel
{
    protected string $table = 'wholesale_retail_logistics_dispatch';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
