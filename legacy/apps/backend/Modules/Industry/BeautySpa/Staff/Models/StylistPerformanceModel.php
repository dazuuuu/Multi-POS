<?php

namespace App\Backend\Modules\Industry\BeautySpa\Staff\Models;

use App\Backend\Models\BaseModel;

class StylistPerformanceModel extends BaseModel
{
    protected string $table = 'beauty_spa_staff_stylist_performance';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
