<?php

namespace App\Backend\Modules\Industry\Supermarkets\Grocery\Models;

use App\Backend\Models\BaseModel;

class ExpiryManagementModel extends BaseModel
{
    protected string $table = 'supermarkets_grocery_expiry_management';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
