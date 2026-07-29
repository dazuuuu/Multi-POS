<?php

namespace App\Backend\Modules\Core\Customers\Models;

use App\Backend\Models\BaseModel;

class LoyaltyPointsModel extends BaseModel
{
    protected string $table = 'customers_loyalty_points';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
