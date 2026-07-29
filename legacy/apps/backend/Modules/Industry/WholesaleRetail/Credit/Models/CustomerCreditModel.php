<?php

namespace App\Backend\Modules\Industry\WholesaleRetail\Credit\Models;

use App\Backend\Models\BaseModel;

class CustomerCreditModel extends BaseModel
{
    protected string $table = 'wholesale_retail_credit_customer_credit';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
