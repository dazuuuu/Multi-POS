<?php

namespace App\Backend\Modules\Roles;

class RoleRegistry
{
    public static function all(): array
    {
        return array_merge(
            PlatformRoles::all(),
            CoreRoles::all(),
            IndustryRoles::all()
        );
    }

    public static function byCategory(string $category): array
    {
        return array_filter(self::all(), fn ($role) => ($role['category'] ?? '') === $category);
    }

    public static function byModule(string $moduleKey): array
    {
        $byModule = IndustryRoles::byModule();
        return $byModule[$moduleKey] ?? [];
    }

    public static function get(string $roleKey): ?array
    {
        return self::all()[$roleKey] ?? null;
    }

    public static function categories(): array
    {
        return [
            'platform' => ['name' => 'Platform', 'roles' => array_keys(PlatformRoles::all())],
            'core' => ['name' => 'Core Business', 'roles' => array_keys(CoreRoles::all())],
            'restaurant_hotels' => ['name' => 'Restaurant & Hotels', 'roles' => array_keys(IndustryRoles::byModule()['restaurant_hotels'] ?? [])],
            'bar_liquor' => ['name' => 'Bar & Liquor', 'roles' => array_keys(IndustryRoles::byModule()['bar_liquor'] ?? [])],
            'wholesale_retail' => ['name' => 'Wholesale & Retail', 'roles' => array_keys(IndustryRoles::byModule()['wholesale_retail'] ?? [])],
            'supermarkets' => ['name' => 'Supermarkets', 'roles' => array_keys(IndustryRoles::byModule()['supermarkets'] ?? [])],
            'beauty_spa' => ['name' => 'Beauty & Spa', 'roles' => array_keys(IndustryRoles::byModule()['beauty_spa'] ?? [])],
            'agrovets_hardware' => ['name' => 'Agrovets & Hardware', 'roles' => array_keys(IndustryRoles::byModule()['agrovets_hardware'] ?? [])],
            'healthcare' => ['name' => 'Healthcare', 'roles' => array_keys(IndustryRoles::byModule()['healthcare'] ?? [])],
        ];
    }
}
