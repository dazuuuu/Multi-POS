<?php

namespace App\Backend\Modules\Industry\WholesaleRetail\Logistics\Models;

use App\Backend\Models\BaseModel;

class ProofOfDeliveryModel extends BaseModel
{
    protected string $table = 'wholesale_retail_logistics_proof_of_delivery';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
