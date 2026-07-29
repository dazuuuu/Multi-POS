<?php

namespace App\Backend\Modules\Industry\BeautySpa\Staff\Models;

use App\Backend\Models\BaseModel;

class CommissionManagementModel extends BaseModel
{
    protected string $table = 'beauty_spa_staff_commission_management';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
