<?php

namespace App\Backend\Modules\Industry\BeautySpa\Services\Models;

use App\Backend\Models\BaseModel;

class MakeupModel extends BaseModel
{
    protected string $table = 'beauty_spa_services_makeup';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
