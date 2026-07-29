<?php

namespace App\Backend\Modules\Core\Invoicing\Models;

use App\Backend\Models\BaseModel;

class InvoiceNumberingModel extends BaseModel
{
    protected string $table = 'invoicing_invoice_numbering';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
