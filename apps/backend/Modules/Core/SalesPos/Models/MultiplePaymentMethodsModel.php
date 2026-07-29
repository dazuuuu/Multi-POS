<?php

namespace App\Backend\Modules\Core\SalesPos\Models;

use App\Backend\Models\BaseModel;

class MultiplePaymentMethodsModel extends BaseModel
{
    protected string $table = 'sales_pos_multiple_payment_methods';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
