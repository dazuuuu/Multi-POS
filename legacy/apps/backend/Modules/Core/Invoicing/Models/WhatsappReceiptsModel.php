<?php

namespace App\Backend\Modules\Core\Invoicing\Models;

use App\Backend\Models\BaseModel;

class WhatsappReceiptsModel extends BaseModel
{
    protected string $table = 'invoicing_whatsapp_receipts';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
