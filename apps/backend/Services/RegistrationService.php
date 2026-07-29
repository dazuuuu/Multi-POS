<?php

namespace App\Backend\Services;

use App\Backend\Models\AuditLog;
use App\Backend\Models\Branch;
use App\Backend\Models\Business;
use App\Backend\Models\BusinessModule;
use App\Backend\Modules\Registry\ModuleRegistry;

class RegistrationService
{
    public function __construct(
        private AuthService $authService = new AuthService(),
        private ModuleService $moduleService = new ModuleService(),
        private Business $businessModel = new Business(),
        private Branch $branchModel = new Branch(),
    ) {
    }

    public function registerBusiness(array $data): array
    {
        $user = $this->authService->register(
            $data['owner_name'],
            $data['email'],
            $data['password']
        );

        $slug = $this->generateSlug($data['business_name']);
        $tier = $data['subscription_tier'] ?? 'starter';
        $selectedModules = $data['modules'] ?? [];

        if (empty($selectedModules)) {
            $selectedModules = $this->defaultModulesForTier($tier);
        }

        $businessId = $this->businessModel->create([
            'owner_id' => $user['id'],
            'name' => $data['business_name'],
            'slug' => $slug,
            'industry_type' => $data['industry_type'] ?? null,
            'email' => $data['email'],
            'phone' => $data['phone'] ?? null,
            'address' => $data['address'] ?? null,
            'currency' => $data['currency'] ?? 'USD',
            'timezone' => $data['timezone'] ?? 'UTC',
            'subscription_tier' => $tier,
        ]);

        $this->branchModel->create([
            'business_id' => $businessId,
            'name' => 'Main Branch',
            'code' => 'MAIN',
            'is_main' => 1,
        ]);

        $this->moduleService->activateModules($businessId, $selectedModules);

        $auditLog = new AuditLog();
        $auditLog->create([
            'business_id' => $businessId,
            'user_id' => $user['id'],
            'action' => 'business_registered',
            'entity_type' => 'business',
            'entity_id' => $businessId,
            'details' => json_encode(['modules' => $selectedModules, 'tier' => $tier]),
            'ip_address' => $_SERVER['REMOTE_ADDR'] ?? null,
        ]);

        $business = $this->businessModel->find($businessId);
        unset($user['password']);

        return [
            'user' => $user,
            'business' => $business,
            'modules' => $this->moduleService->getBusinessModules($businessId),
        ];
    }

    private function generateSlug(string $name): string
    {
        $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $name), '-'));
        $base = $slug;
        $counter = 1;

        while ($this->businessModel->findBySlug($slug)) {
            $slug = $base . '-' . $counter++;
        }

        return $slug;
    }

    private function defaultModulesForTier(string $tier): array
    {
        $tiers = ModuleRegistry::subscriptionTiers();
        $tierConfig = $tiers[$tier] ?? $tiers['starter'];
        $modules = $tierConfig['modules'] ?? [];

        if ($modules === 'all') {
            return array_keys(ModuleRegistry::allModules());
        }

        return $modules;
    }
}
