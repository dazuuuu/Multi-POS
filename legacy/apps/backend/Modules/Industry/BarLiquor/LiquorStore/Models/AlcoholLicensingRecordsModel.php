<?php

namespace App\Backend\Modules\Industry\BarLiquor\LiquorStore\Models;

use App\Backend\Models\BaseModel;

class AlcoholLicensingRecordsModel extends BaseModel
{
    protected string $table = 'bar_liquor_liquor_store_alcohol_licensing_records';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
