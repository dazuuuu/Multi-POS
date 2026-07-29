<?php

namespace App\Backend\Modules\Industry\WholesaleRetail\Logistics\Models;

use App\Backend\Models\BaseModel;

class DeliveryRoutesModel extends BaseModel
{
    protected string $table = 'wholesale_retail_logistics_delivery_routes';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
