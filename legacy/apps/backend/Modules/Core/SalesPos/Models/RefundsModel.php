<?php

namespace App\Backend\Modules\Core\SalesPos\Models;

use App\Backend\Models\BaseModel;

class RefundsModel extends BaseModel
{
    protected string $table = 'sales_pos_refunds';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
