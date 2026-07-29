<?php

namespace App\Backend\Modules\Core\MultiBranch\Models;

use App\Backend\Models\BaseModel;

class BranchInventoryModel extends BaseModel
{
    protected string $table = 'multi_branch_branch_inventory';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
