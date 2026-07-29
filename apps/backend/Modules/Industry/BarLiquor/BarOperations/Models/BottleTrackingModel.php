<?php

namespace App\Backend\Modules\Industry\BarLiquor\BarOperations\Models;

use App\Backend\Models\BaseModel;

class BottleTrackingModel extends BaseModel
{
    protected string $table = 'bar_liquor_bar_operations_bottle_tracking';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
