<?php

namespace App\Backend\Modules\Core\SalesPos\Models;

use App\Backend\Models\BaseModel;

class SplitPaymentsModel extends BaseModel
{
    protected string $table = 'sales_pos_split_payments';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
