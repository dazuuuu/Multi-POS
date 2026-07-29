<?php

namespace Tests\Feature\Database;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class MigrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_all_migrations_run_successfully(): void
    {
        $this->assertTrue(Schema::hasTable('tenants'));
        $this->assertTrue(Schema::hasTable('branches'));
        $this->assertTrue(Schema::hasTable('users'));
        $this->assertTrue(Schema::hasTable('roles'));
        $this->assertTrue(Schema::hasTable('permissions'));
        $this->assertTrue(Schema::hasTable('products'));
        $this->assertTrue(Schema::hasTable('sales'));
        $this->assertTrue(Schema::hasTable('customers'));
        $this->assertTrue(Schema::hasTable('audit_logs'));
        $this->assertTrue(Schema::hasTable('subscription_plans'));
    }

    public function test_seeders_populate_demo_data(): void
    {
        $this->seed();

        $this->assertDatabaseHas('tenants', ['slug' => 'demo-shop']);
        $this->assertDatabaseHas('users', ['email' => 'owner@demo-shop.local', 'is_owner' => true]);
        $this->assertDatabaseHas('branches', ['code' => 'MAIN']);
        $this->assertDatabaseHas('subscription_plans', ['slug' => 'enterprise']);
        $this->assertGreaterThanOrEqual(20, \App\Models\Permission::count());
    }

    public function test_tenant_has_uuid(): void
    {
        $this->seed();

        $tenant = \App\Models\Tenant::where('slug', 'demo-shop')->first();
        $this->assertNotNull($tenant->uuid);
        $this->assertEquals(36, strlen($tenant->uuid));
    }
}
