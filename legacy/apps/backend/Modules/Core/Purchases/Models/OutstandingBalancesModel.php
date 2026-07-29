<?php

namespace App\Backend\Modules\Core\Purchases\Models;

use App\Backend\Models\BaseModel;

class OutstandingBalancesModel extends BaseModel
{
    protected string $table = 'purchases_outstanding_balances';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
