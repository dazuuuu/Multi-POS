<?php

namespace App\Backend\Modules\Core\Invoicing\Models;

use App\Backend\Models\BaseModel;

class InvoiceTemplatesModel extends BaseModel
{
    protected string $table = 'invoicing_invoice_templates';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
