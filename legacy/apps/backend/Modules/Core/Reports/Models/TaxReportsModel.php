<?php

namespace App\Backend\Modules\Core\Reports\Models;

use App\Backend\Models\BaseModel;

class TaxReportsModel extends BaseModel
{
    protected string $table = 'reports_tax_reports';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
