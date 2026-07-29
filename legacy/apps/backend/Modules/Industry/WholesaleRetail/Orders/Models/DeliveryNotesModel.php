<?php

namespace App\Backend\Modules\Industry\WholesaleRetail\Orders\Models;

use App\Backend\Models\BaseModel;

class DeliveryNotesModel extends BaseModel
{
    protected string $table = 'wholesale_retail_orders_delivery_notes';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
