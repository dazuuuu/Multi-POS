<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Tenant Identification
    |--------------------------------------------------------------------------
    |
    | How tenants are resolved on each request. Supported: header, subdomain, path.
    | Phase 3 will implement full resolution. Header is used for API clients.
    |
    */

    'identification' => [
        'driver' => env('TENANCY_DRIVER', 'header'),
        'header' => env('TENANCY_HEADER', 'X-Tenant-ID'),
        'subdomain' => env('TENANCY_SUBDOMAIN_ENABLED', false),
    ],

    /*
    |--------------------------------------------------------------------------
    | Tenant Model
    |--------------------------------------------------------------------------
    */

    'tenant_model' => \App\Models\Tenant::class,

    /*
    |--------------------------------------------------------------------------
    | Central Domains
    |--------------------------------------------------------------------------
    |
    | Domains that should not resolve tenants (registration, platform admin).
    |
    */

    'central_domains' => array_filter(explode(',', env('TENANCY_CENTRAL_DOMAINS', 'localhost'))),

    /*
    |--------------------------------------------------------------------------
    | Tenant Column
    |--------------------------------------------------------------------------
    |
    | Foreign key column used on tenant-scoped models.
    |
    */

    'tenant_column' => 'tenant_id',

    /*
    |--------------------------------------------------------------------------
    | Branch Column
    |--------------------------------------------------------------------------
    */

    'branch_column' => 'branch_id',

];
