<?php

namespace App\Backend\Modules\Industry\BeautySpa\Services\Models;

use App\Backend\Models\BaseModel;

class BraidingModel extends BaseModel
{
    protected string $table = 'beauty_spa_services_braiding';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
