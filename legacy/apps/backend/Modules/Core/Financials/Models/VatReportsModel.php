<?php

namespace App\Backend\Modules\Core\Financials\Models;

use App\Backend\Models\BaseModel;

class VatReportsModel extends BaseModel
{
    protected string $table = 'financials_vat_reports';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
