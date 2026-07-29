<?php

namespace App\Backend\Modules\Core\SalesPos\Models;

use App\Backend\Models\BaseModel;

class TouchScreenModeModel extends BaseModel
{
    protected string $table = 'sales_pos_touch_screen_mode';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
