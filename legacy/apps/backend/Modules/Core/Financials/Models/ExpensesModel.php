<?php

namespace App\Backend\Modules\Core\Financials\Models;

use App\Backend\Models\BaseModel;

class ExpensesModel extends BaseModel
{
    protected string $table = 'financials_expenses';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
