<?php

namespace App\Backend\Modules\Core\MultiBranch\Models;

use App\Backend\Models\BaseModel;

class BranchTransfersModel extends BaseModel
{
    protected string $table = 'multi_branch_branch_transfers';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
