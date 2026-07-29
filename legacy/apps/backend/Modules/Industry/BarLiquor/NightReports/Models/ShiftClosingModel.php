<?php

namespace App\Backend\Modules\Industry\BarLiquor\NightReports\Models;

use App\Backend\Models\BaseModel;

class ShiftClosingModel extends BaseModel
{
    protected string $table = 'bar_liquor_night_reports_shift_closing';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
