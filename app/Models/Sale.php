<?php

namespace App\Models;

use App\Core\Tenancy\Concerns\BelongsToTenant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sale extends Model
{
    use BelongsToTenant;
    use SoftDeletes;

    protected $fillable = [
        'tenant_id', 'branch_id', 'customer_id', 'user_id', 'sale_number',
        'sale_type', 'status', 'subtotal', 'tax_amount', 'discount_amount',
        'total_amount', 'amount_paid', 'amount_due', 'notes', 'created_by',
    ];

    protected function casts(): array
    {
        return [
            'subtotal' => 'decimal:4',
            'tax_amount' => 'decimal:4',
            'discount_amount' => 'decimal:4',
            'total_amount' => 'decimal:4',
            'amount_paid' => 'decimal:4',
            'amount_due' => 'decimal:4',
        ];
    }

    public function items(): HasMany
    {
        return $this->hasMany(SaleItem::class);
    }

    public function payments(): HasMany
    {
        return $this->hasMany(SalePayment::class);
    }
}
