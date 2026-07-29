<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Registered Modules
    |--------------------------------------------------------------------------
    |
    | Each module maps to a service provider and feature set.
    | Tenants enable modules via subscription (Phase 6+).
    |
    */

    'core' => [
        'key' => 'core',
        'name' => 'Core POS',
        'provider' => \App\Modules\Core\Providers\CoreModuleServiceProvider::class,
        'features' => [
            'dashboard', 'sales', 'inventory', 'products', 'purchases',
            'customers', 'suppliers', 'invoices', 'receipts', 'expenses',
            'reports', 'taxes', 'notifications', 'settings', 'audit_logs',
            'multi_branch', 'user_management', 'rbac', 'commissions',
            'credit_sales', 'returns', 'refunds', 'stock_adjustments',
            'stock_transfers', 'barcode', 'qr_code', 'activity_logs',
            'api_keys', 'webhooks',
        ],
    ],

    'restaurant_hotel' => [
        'key' => 'restaurant_hotel',
        'name' => 'Restaurant & Hotel',
        'provider' => null,
        'features' => [
            'tables', 'reservations', 'qr_ordering', 'kitchen_display',
            'menu', 'recipes', 'delivery', 'rooms', 'bookings', 'housekeeping',
        ],
    ],

    'bar_liquor' => [
        'key' => 'bar_liquor',
        'name' => 'Bar & Liquor',
        'provider' => null,
        'features' => [
            'bottle_tracking', 'open_tabs', 'cocktails', 'happy_hour',
            'shift_closing', 'batch_tracking',
        ],
    ],

    'wholesale_retail' => [
        'key' => 'wholesale_retail',
        'name' => 'Wholesale & Retail',
        'provider' => null,
        'features' => [
            'wholesale_pricing', 'bulk_pricing', 'delivery_notes',
            'dispatch', 'credit_limits', 'installments',
        ],
    ],

    'supermarket' => [
        'key' => 'supermarket',
        'name' => 'Supermarket',
        'provider' => null,
        'features' => [
            'barcode_pos', 'weight_scale', 'fresh_produce', 'promotions',
            'loyalty', 'gift_cards', 'cashier_sessions',
        ],
    ],

    'salon_spa' => [
        'key' => 'salon_spa',
        'name' => 'Salon & Spa',
        'provider' => null,
        'features' => [
            'appointments', 'services', 'spa_packages', 'commissions',
            'chair_rental', 'treatment_history',
        ],
    ],

    'agrovet_hardware' => [
        'key' => 'agrovet_hardware',
        'name' => 'Agrovet & Hardware',
        'provider' => null,
        'features' => [
            'animal_medicines', 'feeds', 'seeds', 'chemicals', 'batch_tracking',
            'building_materials', 'tool_rental', 'contractor_accounts',
        ],
    ],

    'healthcare' => [
        'key' => 'healthcare',
        'name' => 'Healthcare (HIS)',
        'provider' => null,
        'features' => [
            'reception', 'emr', 'consultation', 'laboratory', 'radiology',
            'pharmacy', 'insurance', 'billing', 'wards', 'theatre',
            'dental', 'physiotherapy', 'maternity', 'immunization',
        ],
    ],

];
