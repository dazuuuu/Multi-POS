<?php

namespace App\Backend\Modules\Industry\Supermarkets\Loyalty\Models;

use App\Backend\Models\BaseModel;

class CouponsModel extends BaseModel
{
    protected string $table = 'supermarkets_loyalty_coupons';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
