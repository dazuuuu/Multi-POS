<?php

namespace App\Backend\Modules\Industry;

abstract class BaseIndustryModule
{
    protected string $moduleKey;
    protected array $config;

    public function __construct(string $moduleKey)
    {
        $this->moduleKey = $moduleKey;
        $this->config = \App\Backend\Modules\Registry\ModuleRegistry::getModule($moduleKey) ?? [];
    }

    public function getKey(): string
    {
        return $this->moduleKey;
    }

    public function getName(): string
    {
        return $this->config['name'] ?? $this->moduleKey;
    }

    public function getSubmodules(): array
    {
        return $this->config['submodules'] ?? [];
    }

    abstract public function getRoutes(): array;

    public function isEnabled(int $businessId): bool
    {
        $service = new \App\Backend\Services\ModuleService();
        return $service->hasModule($businessId, $this->moduleKey);
    }
}
