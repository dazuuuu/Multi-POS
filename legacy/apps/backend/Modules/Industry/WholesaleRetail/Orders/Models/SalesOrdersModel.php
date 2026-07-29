<?php

namespace App\Backend\Modules\Industry\WholesaleRetail\Orders\Models;

use App\Backend\Models\BaseModel;

class SalesOrdersModel extends BaseModel
{
    protected string $table = 'wholesale_retail_orders_sales_orders';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
