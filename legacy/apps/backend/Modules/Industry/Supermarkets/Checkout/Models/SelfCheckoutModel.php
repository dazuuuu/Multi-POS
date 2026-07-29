<?php

namespace App\Backend\Modules\Industry\Supermarkets\Checkout\Models;

use App\Backend\Models\BaseModel;

class SelfCheckoutModel extends BaseModel
{
    protected string $table = 'supermarkets_checkout_self_checkout';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
