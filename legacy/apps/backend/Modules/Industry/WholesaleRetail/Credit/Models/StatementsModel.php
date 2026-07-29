<?php

namespace App\Backend\Modules\Industry\WholesaleRetail\Credit\Models;

use App\Backend\Models\BaseModel;

class StatementsModel extends BaseModel
{
    protected string $table = 'wholesale_retail_credit_statements';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
