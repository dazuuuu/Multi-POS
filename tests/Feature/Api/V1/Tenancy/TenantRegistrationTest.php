<?php

namespace Tests\Feature\Api\V1\Tenancy;

use App\Models\Branch;
use App\Models\Customer;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TenantRegistrationTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed([
            \Database\Seeders\PermissionSeeder::class,
            \Database\Seeders\RoleSeeder::class,
            \Database\Seeders\SubscriptionPlanSeeder::class,
        ]);
    }

    public function test_tenant_can_register(): void
    {
        $response = $this->postJson('/api/v1/tenants/register', [
            'owner_name' => 'Jane Owner',
            'owner_email' => 'jane@acme.test',
            'password' => 'Password1!',
            'password_confirmation' => 'Password1!',
            'business_name' => 'Acme Retail',
            'currency' => 'USD',
            'plan' => 'starter',
        ]);

        $response->assertCreated()
            ->assertJsonPath('success', true)
            ->assertJsonStructure([
                'data' => [
                    'tenant' => ['id', 'uuid', 'slug', 'name'],
                    'branch' => ['id', 'code', 'is_main'],
                    'user' => ['id', 'email', 'is_owner'],
                    'token',
                ],
            ]);

        $this->assertDatabaseHas('tenants', ['slug' => 'acme-retail']);
        $this->assertDatabaseHas('users', ['email' => 'jane@acme.test', 'is_owner' => true]);
        $this->assertDatabaseHas('branches', ['code' => 'MAIN', 'is_main' => true]);
    }

    public function test_registration_validates_required_fields(): void
    {
        $response = $this->postJson('/api/v1/tenants/register', []);

        $response->assertStatus(422)
            ->assertJsonPath('success', false)
            ->assertJsonPath('code', 'VALIDATION_ERROR');
    }
}
