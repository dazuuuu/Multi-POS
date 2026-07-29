<?php

namespace App\Backend\Modules\Core\Purchases\Models;

use App\Backend\Models\BaseModel;

class SuppliersModel extends BaseModel
{
    protected string $table = 'purchases_suppliers';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
