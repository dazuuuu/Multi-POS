<?php

namespace App\Backend\Modules\Industry\BeautySpa\CustomerRecords\Models;

use App\Backend\Models\BaseModel;

class BeforeAfterPhotosModel extends BaseModel
{
    protected string $table = 'beauty_spa_customer_records_before_after_photos';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
