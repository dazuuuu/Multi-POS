<?php

namespace App\Backend\Modules\Core\Suppliers\Models;

use App\Backend\Models\BaseModel;

class SupplierDirectoryModel extends BaseModel
{
    protected string $table = 'suppliers_supplier_directory';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
