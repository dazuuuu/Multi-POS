<?php

namespace App\Backend\Modules\Industry\BeautySpa\Appointments\Models;

use App\Backend\Models\BaseModel;

class WalkInsModel extends BaseModel
{
    protected string $table = 'beauty_spa_appointments_walk_ins';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
