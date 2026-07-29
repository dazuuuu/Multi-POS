<?php

namespace App\Backend\Modules\Industry\BeautySpa\BeautyProducts\Models;

use App\Backend\Models\BaseModel;

class RetailCosmeticsModel extends BaseModel
{
    protected string $table = 'beauty_spa_beauty_products_retail_cosmetics';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
