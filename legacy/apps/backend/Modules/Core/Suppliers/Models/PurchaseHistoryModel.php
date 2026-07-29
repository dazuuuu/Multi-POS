<?php

namespace App\Backend\Modules\Core\Suppliers\Models;

use App\Backend\Models\BaseModel;

class PurchaseHistoryModel extends BaseModel
{
    protected string $table = 'suppliers_purchase_history';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
