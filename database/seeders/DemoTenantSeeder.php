<?php

namespace Database\Seeders;

use App\Models\Branch;
use App\Models\Role;
use App\Models\SubscriptionPlan;
use App\Models\Tenant;
use App\Models\TenantModule;
use App\Models\TenantSubscription;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DemoTenantSeeder extends Seeder
{
    public function run(): void
    {
        $tenant = Tenant::query()->updateOrCreate(
            ['slug' => 'demo-shop'],
            [
                'name' => 'Demo Shop',
                'email' => 'owner@demo-shop.local',
                'phone' => '+1234567890',
                'timezone' => 'UTC',
                'currency' => 'USD',
                'is_active' => true,
                'settings' => ['onboarding_complete' => true],
            ]
        );

        $branch = Branch::query()->updateOrCreate(
            ['tenant_id' => $tenant->id, 'code' => 'MAIN'],
            [
                'name' => 'Main Branch',
                'address' => '123 Demo Street',
                'phone' => '+1234567890',
                'is_main' => true,
                'is_active' => true,
            ]
        );

        $owner = User::query()->updateOrCreate(
            ['tenant_id' => $tenant->id, 'email' => 'owner@demo-shop.local'],
            [
                'name' => 'Demo Owner',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
                'is_active' => true,
                'is_owner' => true,
            ]
        );

        $ownerRole = Role::query()->where('slug', 'business_owner')->first();
        if ($ownerRole) {
            $owner->roles()->syncWithoutDetaching([
                $ownerRole->id => ['branch_id' => $branch->id],
            ]);
        }

        $plan = SubscriptionPlan::query()->where('slug', 'enterprise')->first();
        if ($plan) {
            TenantSubscription::query()->updateOrCreate(
                ['tenant_id' => $tenant->id, 'subscription_plan_id' => $plan->id],
                [
                    'status' => 'active',
                    'starts_at' => now(),
                    'trial_ends_at' => now()->addDays(14),
                ]
            );

            foreach ($plan->modules ?? ['core'] as $moduleKey) {
                TenantModule::query()->updateOrCreate(
                    ['tenant_id' => $tenant->id, 'module_key' => $moduleKey],
                    ['is_enabled' => true, 'activated_at' => now()]
                );
            }
        }
    }
}
