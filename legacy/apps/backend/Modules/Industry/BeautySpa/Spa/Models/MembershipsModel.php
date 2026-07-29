<?php

namespace App\Backend\Modules\Industry\BeautySpa\Spa\Models;

use App\Backend\Models\BaseModel;

class MembershipsModel extends BaseModel
{
    protected string $table = 'beauty_spa_spa_memberships';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
