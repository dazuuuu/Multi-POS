<?php

namespace App\Backend\Modules\Core\Invoicing\Models;

use App\Backend\Models\BaseModel;

class ProformaInvoicesModel extends BaseModel
{
    protected string $table = 'invoicing_proforma_invoices';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
