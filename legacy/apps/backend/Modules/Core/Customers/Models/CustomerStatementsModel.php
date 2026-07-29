<?php

namespace App\Backend\Modules\Core\Customers\Models;

use App\Backend\Models\BaseModel;

class CustomerStatementsModel extends BaseModel
{
    protected string $table = 'customers_customer_statements';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
