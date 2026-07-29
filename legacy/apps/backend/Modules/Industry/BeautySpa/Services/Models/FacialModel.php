<?php

namespace App\Backend\Modules\Industry\BeautySpa\Services\Models;

use App\Backend\Models\BaseModel;

class FacialModel extends BaseModel
{
    protected string $table = 'beauty_spa_services_facial';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
