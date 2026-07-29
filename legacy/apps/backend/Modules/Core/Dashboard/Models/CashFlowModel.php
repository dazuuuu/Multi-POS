<?php

namespace App\Backend\Modules\Core\Dashboard\Models;

use App\Backend\Models\BaseModel;

class CashFlowModel extends BaseModel
{
    protected string $table = 'dashboard_cash_flow';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
