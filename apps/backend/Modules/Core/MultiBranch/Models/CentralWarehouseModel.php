<?php

namespace App\Backend\Modules\Core\MultiBranch\Models;

use App\Backend\Models\BaseModel;

class CentralWarehouseModel extends BaseModel
{
    protected string $table = 'multi_branch_central_warehouse';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
