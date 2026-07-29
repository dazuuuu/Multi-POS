<?php

namespace App\Backend\Modules\Core\SalesPos\Models;

use App\Backend\Models\BaseModel;

class CreditSalesModel extends BaseModel
{
    protected string $table = 'sales_pos_credit_sales';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
