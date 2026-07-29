<?php

namespace App\Backend\Modules\Industry\BarLiquor\LiquorStore\Models;

use App\Backend\Models\BaseModel;

class ExpiryTrackingModel extends BaseModel
{
    protected string $table = 'bar_liquor_liquor_store_expiry_tracking';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
