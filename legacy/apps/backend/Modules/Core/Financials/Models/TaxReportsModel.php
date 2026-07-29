<?php

namespace App\Backend\Modules\Core\Financials\Models;

use App\Backend\Models\BaseModel;

class TaxReportsModel extends BaseModel
{
    protected string $table = 'financials_tax_reports';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
