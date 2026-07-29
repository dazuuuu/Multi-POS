<?php

namespace App\Backend\Modules\Industry\BarLiquor\LiquorStore\Models;

use App\Backend\Models\BaseModel;

class BottleBarcodeModel extends BaseModel
{
    protected string $table = 'bar_liquor_liquor_store_bottle_barcode';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
