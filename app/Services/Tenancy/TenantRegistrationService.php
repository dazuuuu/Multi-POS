<?php

namespace App\Services\Tenancy;

use App\Models\Branch;
use App\Models\Role;
use App\Models\SubscriptionPlan;
use App\Models\Tenant;
use App\Models\TenantModule;
use App\Models\TenantSubscription;
use App\Models\User;
use App\Services\BaseService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TenantRegistrationService extends BaseService
{
    /**
     * @param  array{
     *     owner_name: string,
     *     owner_email: string,
     *     password: string,
     *     business_name: string,
     *     phone?: string|null,
     *     timezone?: string,
     *     currency?: string,
     *     plan?: string,
     *     modules?: array<int, string>
     * }  $data
     * @return array{tenant: Tenant, branch: Branch, user: User}
     */
    public function register(array $data): array
    {
        return DB::transaction(function () use ($data) {
            $slug = $this->uniqueSlug($data['business_name']);

            $tenant = Tenant::query()->create([
                'name' => $data['business_name'],
                'slug' => $slug,
                'email' => $data['owner_email'],
                'phone' => $data['phone'] ?? null,
                'timezone' => $data['timezone'] ?? 'UTC',
                'currency' => $data['currency'] ?? 'USD',
                'is_active' => true,
                'settings' => [
                    'onboarding_complete' => false,
                ],
            ]);

            $branch = Branch::query()->create([
                'tenant_id' => $tenant->id,
                'name' => 'Main Branch',
                'code' => 'MAIN',
                'phone' => $data['phone'] ?? null,
                'is_main' => true,
                'is_active' => true,
            ]);

            $user = User::query()->create([
                'tenant_id' => $tenant->id,
                'name' => $data['owner_name'],
                'email' => $data['owner_email'],
                'password' => $data['password'],
                'phone' => $data['phone'] ?? null,
                'email_verified_at' => null,
                'is_active' => true,
                'is_owner' => true,
                'password_changed_at' => now(),
            ]);

            $ownerRole = Role::query()
                ->whereNull('tenant_id')
                ->where('slug', 'business_owner')
                ->first();

            if ($ownerRole) {
                $user->roles()->attach($ownerRole->id, ['branch_id' => $branch->id]);
            }

            $planSlug = $data['plan'] ?? 'starter';
            $plan = SubscriptionPlan::query()->where('slug', $planSlug)->first()
                ?? SubscriptionPlan::query()->where('slug', 'starter')->first();

            if ($plan) {
                TenantSubscription::query()->create([
                    'tenant_id' => $tenant->id,
                    'subscription_plan_id' => $plan->id,
                    'status' => 'trialing',
                    'starts_at' => now(),
                    'trial_ends_at' => now()->addDays(14),
                ]);

                $modules = $data['modules'] ?? ($plan->modules ?? ['core']);
                if (! in_array('core', $modules, true)) {
                    array_unshift($modules, 'core');
                }

                foreach (array_unique($modules) as $moduleKey) {
                    TenantModule::query()->create([
                        'tenant_id' => $tenant->id,
                        'module_key' => $moduleKey,
                        'is_enabled' => true,
                        'activated_at' => now(),
                    ]);
                }
            }

            return [
                'tenant' => $tenant->fresh(),
                'branch' => $branch,
                'user' => $user->fresh(),
            ];
        });
    }

    private function uniqueSlug(string $name): string
    {
        $base = Str::slug($name);
        $slug = $base !== '' ? $base : 'tenant';
        $counter = 1;

        while (Tenant::withTrashed()->where('slug', $slug)->exists()) {
            $slug = $base.'-'.$counter;
            $counter++;
        }

        return $slug;
    }
}
