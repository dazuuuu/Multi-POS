<?php

namespace App\Backend\Modules\Core\MultiBranch\Models;

use App\Backend\Models\BaseModel;

class BranchManagersModel extends BaseModel
{
    protected string $table = 'multi_branch_branch_managers';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
