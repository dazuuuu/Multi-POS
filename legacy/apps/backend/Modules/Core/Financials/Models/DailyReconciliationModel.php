<?php

namespace App\Backend\Modules\Core\Financials\Models;

use App\Backend\Models\BaseModel;

class DailyReconciliationModel extends BaseModel
{
    protected string $table = 'financials_daily_reconciliation';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
