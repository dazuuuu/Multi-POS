<?php

namespace App\Backend\Modules\Core\Dashboard\Models;

use App\Backend\Models\BaseModel;

class GraphsAnalyticsModel extends BaseModel
{
    protected string $table = 'dashboard_graphs_analytics';
    protected array $fillable = [
        'business_id', 'branch_id', 'data', 'status', 'metadata',
    ];
}
