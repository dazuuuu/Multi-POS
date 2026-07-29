<?php

namespace App\Backend\Modules\Industry\Supermarkets\Checkout\Models;

use App\Backend\Models\BaseModel;

class QueueManagementModel extends BaseModel
{
    protected string $table = 'supermarkets_checkout_queue_management';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
