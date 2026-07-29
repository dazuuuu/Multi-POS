<?php

namespace App\Backend\Modules\Core\Financials\Models;

use App\Backend\Models\BaseModel;

class ProfitLossModel extends BaseModel
{
    protected string $table = 'financials_profit_loss';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
