<?php

namespace App\Models\Industry;

use App\Core\Tenancy\Concerns\BelongsToTenant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SupermarketCashierSessions extends Model
{
    use BelongsToTenant;
    use SoftDeletes;

    protected $table = 'cashier_sessions';

    protected $fillable = [
        'tenant_id', 'branch_id', 'name', 'code', 'status', 'data', 'metadata', 'is_active',
    ];

    protected function casts(): array
    {
        return [
            'data' => 'array',
            'metadata' => 'array',
            'is_active' => 'boolean',
        ];
    }
}
