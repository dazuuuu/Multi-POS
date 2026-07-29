<?php

namespace App\Backend\Modules\Industry\BeautySpa\BeautyProducts\Models;

use App\Backend\Models\BaseModel;

class BeautyInventoryModel extends BaseModel
{
    protected string $table = 'beauty_spa_beauty_products_beauty_inventory';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
