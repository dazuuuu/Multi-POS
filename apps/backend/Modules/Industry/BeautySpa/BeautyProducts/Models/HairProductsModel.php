<?php

namespace App\Backend\Modules\Industry\BeautySpa\BeautyProducts\Models;

use App\Backend\Models\BaseModel;

class HairProductsModel extends BaseModel
{
    protected string $table = 'beauty_spa_beauty_products_hair_products';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
