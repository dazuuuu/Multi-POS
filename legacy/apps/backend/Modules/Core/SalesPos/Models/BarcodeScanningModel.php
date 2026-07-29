<?php

namespace App\Backend\Modules\Core\SalesPos\Models;

use App\Backend\Models\BaseModel;

class BarcodeScanningModel extends BaseModel
{
    protected string $table = 'sales_pos_barcode_scanning';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
