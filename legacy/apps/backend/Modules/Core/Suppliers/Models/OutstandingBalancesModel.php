<?php

namespace App\Backend\Modules\Core\Suppliers\Models;

use App\Backend\Models\BaseModel;

class OutstandingBalancesModel extends BaseModel
{
    protected string $table = 'suppliers_outstanding_balances';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
