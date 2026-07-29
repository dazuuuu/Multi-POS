<?php

namespace App\Models;

use App\Core\Tenancy\Concerns\BelongsToTenant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use BelongsToTenant;
    use SoftDeletes;

    protected $fillable = [
        'tenant_id', 'branch_id', 'customer_group_id', 'name', 'email', 'phone',
        'address', 'credit_limit', 'balance', 'loyalty_points', 'date_of_birth',
        'metadata', 'is_active',
    ];

    protected function casts(): array
    {
        return [
            'credit_limit' => 'decimal:4',
            'balance' => 'decimal:4',
            'date_of_birth' => 'date',
            'metadata' => 'array',
            'is_active' => 'boolean',
        ];
    }

    public function sales(): HasMany
    {
        return $this->hasMany(Sale::class);
    }
}
