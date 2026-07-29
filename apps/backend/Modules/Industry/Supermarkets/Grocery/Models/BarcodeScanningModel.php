<?php

namespace App\Backend\Modules\Industry\Supermarkets\Grocery\Models;

use App\Backend\Models\BaseModel;

class BarcodeScanningModel extends BaseModel
{
    protected string $table = 'supermarkets_grocery_barcode_scanning';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
