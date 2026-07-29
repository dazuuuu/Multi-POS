<?php

namespace App\Backend\Modules\Core\Purchases\Models;

use App\Backend\Models\BaseModel;

class PaymentSchedulesModel extends BaseModel
{
    protected string $table = 'purchases_payment_schedules';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
