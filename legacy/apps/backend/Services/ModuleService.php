<?php

namespace App\Backend\Services;

use App\Backend\Models\AuditLog;
use App\Backend\Modules\Registry\ModuleRegistry;

class ModuleService
{
    private \App\Backend\Models\BusinessModule $businessModuleModel;

    public function __construct()
    {
        $this->businessModuleModel = new \App\Backend\Models\BusinessModule();
    }

    public function getRegistry(): array
    {
        return [
            'core' => ModuleRegistry::coreModules(),
            'industry' => ModuleRegistry::industryModules(),
            'tiers' => ModuleRegistry::subscriptionTiers(),
            'categories' => ModuleRegistry::categories(),
        ];
    }

    public function activateModules(int $businessId, array $moduleKeys): void
    {
        $allModules = ModuleRegistry::allModules();

        foreach ($moduleKeys as $key) {
            if (!isset($allModules[$key])) {
                continue;
            }
            $category = $allModules[$key]['category'] ?? 'core';
            $this->businessModuleModel->enable($businessId, $key, $category);
        }
    }

    public function getBusinessModules(int $businessId): array
    {
        $enabled = $this->businessModuleModel->getActiveByBusiness($businessId);
        $allModules = ModuleRegistry::allModules();
        $result = [];

        foreach ($enabled as $row) {
            $key = $row['module_key'];
            if (isset($allModules[$key])) {
                $result[$key] = array_merge($allModules[$key], [
                    'activated_at' => $row['activated_at'],
                    'settings' => $row['settings'] ? json_decode($row['settings'], true) : null,
                ]);
            }
        }

        return $result;
    }

    public function hasModule(int $businessId, string $moduleKey): bool
    {
        $config = require \FilePaths::appPath('config/app.php');
        if (!$config['subscription_enforcement']) {
            return true;
        }
        return $this->businessModuleModel->isEnabled($businessId, $moduleKey);
    }

    public function getModuleHomeData(string $moduleKey): ?array
    {
        $module = ModuleRegistry::getModule($moduleKey);
        if (!$module) {
            return null;
        }

        $features = ModuleRegistry::flattenFeatures($moduleKey);
        $submodules = $module['submodules'] ?? null;

        return [
            'key' => $moduleKey,
            'name' => $module['name'],
            'description' => $module['description'],
            'icon' => $module['icon'],
            'category' => $module['category'],
            'features' => $features,
            'submodules' => $submodules,
            'feature_count' => count($features),
        ];
    }
}
