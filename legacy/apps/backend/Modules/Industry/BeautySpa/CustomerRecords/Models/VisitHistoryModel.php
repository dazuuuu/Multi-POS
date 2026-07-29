<?php

namespace App\Backend\Modules\Industry\BeautySpa\CustomerRecords\Models;

use App\Backend\Models\BaseModel;

class VisitHistoryModel extends BaseModel
{
    protected string $table = 'beauty_spa_customer_records_visit_history';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
