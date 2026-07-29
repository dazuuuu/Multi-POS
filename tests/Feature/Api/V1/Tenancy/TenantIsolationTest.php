<?php

namespace Tests\Feature\Api\V1\Tenancy;

use App\Core\Tenancy\TenantContext;
use App\Models\Branch;
use App\Models\Customer;
use App\Models\Tenant;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TenantIsolationTest extends TestCase
{
    use RefreshDatabase;

    public function test_tenant_endpoint_requires_header(): void
    {
        $response = $this->getJson('/api/v1/tenant');

        $response->assertStatus(400)
            ->assertJsonPath('code', 'TENANT_REQUIRED');
    }

    public function test_tenant_endpoint_resolves_by_id(): void
    {
        $tenant = Tenant::factory()->create();

        $response = $this->withHeader('X-Tenant-ID', (string) $tenant->id)
            ->getJson('/api/v1/tenant');

        $response->assertOk()
            ->assertJsonPath('data.tenant.id', $tenant->id)
            ->assertJsonPath('data.tenant.slug', $tenant->slug);
    }

    public function test_tenant_endpoint_resolves_by_uuid(): void
    {
        $tenant = Tenant::factory()->create();

        $response = $this->withHeader('X-Tenant-ID', $tenant->uuid)
            ->getJson('/api/v1/tenant');

        $response->assertOk()
            ->assertJsonPath('data.tenant.uuid', $tenant->uuid);
    }

    public function test_tenant_endpoint_resolves_by_slug(): void
    {
        $tenant = Tenant::factory()->create(['slug' => 'shop-alpha']);

        $response = $this->withHeader('X-Tenant-ID', 'shop-alpha')
            ->getJson('/api/v1/tenant');

        $response->assertOk()
            ->assertJsonPath('data.tenant.slug', 'shop-alpha');
    }

    public function test_inactive_tenant_is_forbidden(): void
    {
        $tenant = Tenant::factory()->create(['is_active' => false]);

        $response = $this->withHeader('X-Tenant-ID', (string) $tenant->id)
            ->getJson('/api/v1/tenant');

        $response->assertForbidden()
            ->assertJsonPath('code', 'FORBIDDEN');
    }

    public function test_tenant_scope_isolates_customer_records(): void
    {
        $tenantA = Tenant::factory()->create();
        $tenantB = Tenant::factory()->create();

        TenantContext::set($tenantA);
        Customer::query()->create([
            'tenant_id' => $tenantA->id,
            'name' => 'Customer A',
            'email' => 'a@test.com',
        ]);
        TenantContext::clear();

        TenantContext::set($tenantB);
        Customer::query()->create([
            'tenant_id' => $tenantB->id,
            'name' => 'Customer B',
            'email' => 'b@test.com',
        ]);

        $visible = Customer::query()->get();
        $this->assertCount(1, $visible);
        $this->assertEquals('Customer B', $visible->first()->name);
        TenantContext::clear();

        TenantContext::set($tenantA);
        $visibleA = Customer::query()->get();
        $this->assertCount(1, $visibleA);
        $this->assertEquals('Customer A', $visibleA->first()->name);
        TenantContext::clear();
    }

    public function test_branches_are_scoped_to_tenant(): void
    {
        $tenantA = Tenant::factory()->create();
        $tenantB = Tenant::factory()->create();

        Branch::factory()->main()->create(['tenant_id' => $tenantA->id, 'name' => 'A Main']);
        Branch::factory()->main()->create(['tenant_id' => $tenantB->id, 'name' => 'B Main']);

        $response = $this->withHeader('X-Tenant-ID', (string) $tenantA->id)
            ->getJson('/api/v1/tenant/branches');

        $response->assertOk();
        $names = collect($response->json('data'))->pluck('name');
        $this->assertTrue($names->contains('A Main'));
        $this->assertFalse($names->contains('B Main'));
    }
}
