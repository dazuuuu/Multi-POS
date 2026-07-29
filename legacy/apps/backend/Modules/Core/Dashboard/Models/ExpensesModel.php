<?php

namespace App\Backend\Modules\Core\Dashboard\Models;

use App\Backend\Models\BaseModel;

class ExpensesModel extends BaseModel
{
    protected string $table = 'dashboard_expenses';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
