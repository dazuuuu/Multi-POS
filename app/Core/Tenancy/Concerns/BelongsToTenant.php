<?php

namespace App\Core\Tenancy\Concerns;

use App\Core\Tenancy\Scopes\TenantScope;
use App\Core\Tenancy\TenantContext;
use App\Models\Tenant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @mixin Model
 */
trait BelongsToTenant
{
    public static function bootBelongsToTenant(): void
    {
        static::addGlobalScope(new TenantScope);

        static::creating(function (Model $model): void {
            $column = config('tenancy.tenant_column', 'tenant_id');

            if ($model->{$column} === null && TenantContext::id() !== null) {
                $model->{$column} = TenantContext::id();
            }
        });
    }

    public function tenant(): BelongsTo
    {
        return $this->belongsTo(Tenant::class, config('tenancy.tenant_column', 'tenant_id'));
    }
}
