<?php

namespace App\Backend\Modules\Industry\Supermarkets\Checkout\Models;

use App\Backend\Models\BaseModel;

class MultipleCashiersModel extends BaseModel
{
    protected string $table = 'supermarkets_checkout_multiple_cashiers';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
