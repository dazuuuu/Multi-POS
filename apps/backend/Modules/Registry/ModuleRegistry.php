<?php

namespace App\Backend\Modules\Registry;

class ModuleRegistry
{
    public static function coreModules(): array
    {
        return CoreModules::all();
    }

    public static function industryModules(): array
    {
        return IndustryModules::all();
    }

    public static function subscriptionTiers(): array
    {
        return SubscriptionTiers::all();
    }

    public static function allModules(): array
    {
        return array_merge(self::coreModules(), self::industryModules());
    }

    public static function getModule(string $key): ?array
    {
        return self::allModules()[$key] ?? null;
    }

    public static function categories(): array
    {
        return [
            'core' => [
                'name' => 'Core System',
                'description' => 'Features available to every business regardless of industry.',
                'icon' => 'layer-group',
                'modules' => array_keys(self::coreModules()),
            ],
            'industry' => [
                'name' => 'Industry Modules',
                'description' => 'Specialized modules for specific business types.',
                'icon' => 'industry',
                'modules' => array_keys(self::industryModules()),
            ],
        ];
    }

    public static function flattenFeatures(string $moduleKey): array
    {
        $module = self::getModule($moduleKey);
        if ($module === null) {
            return [];
        }

        if (isset($module['features'])) {
            return $module['features'];
        }

        $features = [];
        foreach ($module['submodules'] ?? [] as $submodule) {
            $features = array_merge($features, $submodule['features'] ?? []);
        }

        return $features;
    }
}
