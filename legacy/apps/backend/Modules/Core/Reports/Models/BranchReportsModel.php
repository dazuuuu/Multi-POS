<?php

namespace App\Backend\Modules\Core\Reports\Models;

use App\Backend\Models\BaseModel;

class BranchReportsModel extends BaseModel
{
    protected string $table = 'reports_branch_reports';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
