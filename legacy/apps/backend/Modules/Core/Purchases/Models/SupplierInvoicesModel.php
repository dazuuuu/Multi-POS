<?php

namespace App\Backend\Modules\Core\Purchases\Models;

use App\Backend\Models\BaseModel;

class SupplierInvoicesModel extends BaseModel
{
    protected string $table = 'purchases_supplier_invoices';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
