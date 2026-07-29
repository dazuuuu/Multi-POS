<?php

namespace App\Backend\Modules\Core\Inventory\Models;

use App\Backend\Models\BaseModel;

class ProductImagesModel extends BaseModel
{
    protected string $table = 'inventory_product_images';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
