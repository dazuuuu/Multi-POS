<?php

namespace App\Backend\Modules\Industry\BarLiquor\NightReports\Models;

use App\Backend\Models\BaseModel;

class CashReconciliationModel extends BaseModel
{
    protected string $table = 'bar_liquor_night_reports_cash_reconciliation';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
