<?php

namespace App\Backend\Modules\Industry\BeautySpa\CustomerRecords\Models;

use App\Backend\Models\BaseModel;

class PreferredStylistModel extends BaseModel
{
    protected string $table = 'beauty_spa_customer_records_preferred_stylist';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
