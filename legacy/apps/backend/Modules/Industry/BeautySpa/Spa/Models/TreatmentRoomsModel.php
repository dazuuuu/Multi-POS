<?php

namespace App\Backend\Modules\Industry\BeautySpa\Spa\Models;

use App\Backend\Models\BaseModel;

class TreatmentRoomsModel extends BaseModel
{
    protected string $table = 'beauty_spa_spa_treatment_rooms';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
