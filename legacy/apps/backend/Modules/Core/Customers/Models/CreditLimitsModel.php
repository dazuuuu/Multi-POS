<?php

namespace App\Backend\Modules\Core\Customers\Models;

use App\Backend\Models\BaseModel;

class CreditLimitsModel extends BaseModel
{
    protected string $table = 'customers_credit_limits';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
