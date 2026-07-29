<?php

namespace App\Backend\Modules\Registry;

class SubscriptionTiers
{
    public static function all(): array
    {
        return [
            'starter' => [
                'name' => 'Starter',
                'description' => 'Small shops, cosmetics, barber shops, and kiosks.',
                'price_monthly' => 29.00,
                'price_yearly' => 290.00,
                'suitable_for' => ['Small shops', 'Cosmetics', 'Barber shops', 'Kiosks'],
                'modules' => [
                    'business_management',
                    'dashboard',
                    'sales_pos',
                    'invoicing',
                    'inventory',
                    'customers',
                    'reports',
                ],
                'limits' => [
                    'branches' => 1,
                    'users' => 3,
                    'products' => 500,
                ],
            ],
            'professional' => [
                'name' => 'Professional',
                'description' => 'Restaurants, supermarkets, hardware stores, agrovets, and wholesale.',
                'price_monthly' => 79.00,
                'price_yearly' => 790.00,
                'suitable_for' => ['Restaurants', 'Supermarkets', 'Hardware stores', 'Agrovets', 'Wholesale businesses'],
                'modules' => [
                    'business_management',
                    'dashboard',
                    'sales_pos',
                    'invoicing',
                    'inventory',
                    'purchases',
                    'customers',
                    'suppliers',
                    'financials',
                    'employees',
                    'user_roles',
                    'multi_branch',
                    'reports',
                ],
                'limits' => [
                    'branches' => 10,
                    'users' => 25,
                    'products' => 10000,
                ],
            ],
            'enterprise' => [
                'name' => 'Enterprise',
                'description' => 'Hotels, hospitals, pharmacy chains, large retailers, and franchises.',
                'price_monthly' => 199.00,
                'price_yearly' => 1990.00,
                'suitable_for' => ['Hotels', 'Hospitals', 'Pharmacy chains', 'Large retailers', 'Multi-location franchises'],
                'modules' => 'all',
                'industry_modules' => 'all',
                'limits' => [
                    'branches' => -1,
                    'users' => -1,
                    'products' => -1,
                ],
                'extras' => [
                    'api_integrations',
                    'workflow_automation',
                    'audit_trails',
                    'custom_reports',
                    'white_label_support',
                    'multi_tenant_management',
                ],
            ],
        ];
    }
}
