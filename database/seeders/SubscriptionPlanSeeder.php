<?php

namespace Database\Seeders;

use App\Models\SubscriptionPlan;
use Illuminate\Database\Seeder;

class SubscriptionPlanSeeder extends Seeder
{
    public function run(): void
    {
        $plans = [
            [
                'name' => 'Starter',
                'slug' => 'starter',
                'price_monthly' => 29.00,
                'price_yearly' => 290.00,
                'modules' => ['core'],
                'limits' => ['branches' => 1, 'users' => 3, 'products' => 500],
            ],
            [
                'name' => 'Professional',
                'slug' => 'professional',
                'price_monthly' => 79.00,
                'price_yearly' => 790.00,
                'modules' => ['core', 'restaurant_hotel', 'supermarket', 'wholesale_retail'],
                'limits' => ['branches' => 10, 'users' => 25, 'products' => 10000],
            ],
            [
                'name' => 'Enterprise',
                'slug' => 'enterprise',
                'price_monthly' => 199.00,
                'price_yearly' => 1990.00,
                'modules' => ['core', 'restaurant_hotel', 'bar_liquor', 'wholesale_retail', 'supermarket', 'salon_spa', 'agrovet_hardware', 'healthcare'],
                'limits' => ['branches' => -1, 'users' => -1, 'products' => -1],
            ],
        ];

        foreach ($plans as $plan) {
            SubscriptionPlan::query()->updateOrCreate(
                ['slug' => $plan['slug']],
                array_merge($plan, ['is_active' => true])
            );
        }
    }
}
