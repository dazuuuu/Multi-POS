<?php

namespace App\Backend\Modules\Industry\BarLiquor\BarOperations\Models;

use App\Backend\Models\BaseModel;

class HappyHourPricingModel extends BaseModel
{
    protected string $table = 'bar_liquor_bar_operations_happy_hour_pricing';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
