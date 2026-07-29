<?php

namespace App\Backend\Modules\Core\Invoicing\Models;

use App\Backend\Models\BaseModel;

class EmailReceiptsModel extends BaseModel
{
    protected string $table = 'invoicing_email_receipts';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
