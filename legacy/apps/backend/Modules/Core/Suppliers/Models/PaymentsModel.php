<?php

namespace App\Backend\Modules\Core\Suppliers\Models;

use App\Backend\Models\BaseModel;

class PaymentsModel extends BaseModel
{
    protected string $table = 'suppliers_payments';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
