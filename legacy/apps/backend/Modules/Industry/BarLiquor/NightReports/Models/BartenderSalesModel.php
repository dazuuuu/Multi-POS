<?php

namespace App\Backend\Modules\Industry\BarLiquor\NightReports\Models;

use App\Backend\Models\BaseModel;

class BartenderSalesModel extends BaseModel
{
    protected string $table = 'bar_liquor_night_reports_bartender_sales';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
