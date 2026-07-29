<?php

namespace App\Core\Tenancy;

use App\Models\Tenant;

final class TenantContext
{
    private static ?Tenant $tenant = null;

    private static ?int $branchId = null;

    public static function set(Tenant $tenant): void
    {
        self::$tenant = $tenant;
    }

    public static function get(): ?Tenant
    {
        return self::$tenant;
    }

    public static function id(): ?int
    {
        return self::$tenant?->id;
    }

    public static function check(): bool
    {
        return self::$tenant !== null;
    }

    public static function setBranch(?int $branchId): void
    {
        self::$branchId = $branchId;
    }

    public static function branchId(): ?int
    {
        return self::$branchId;
    }

    public static function clear(): void
    {
        self::$tenant = null;
        self::$branchId = null;
    }
}
