<?php

namespace Tests\Feature\Api\V1\Auth;

use App\Models\Tenant;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthTest extends TestCase
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

    public function test_user_can_login(): void
    {
        $tenant = Tenant::factory()->create();
        $user = User::factory()->create([
            'tenant_id' => $tenant->id,
            'email' => 'cashier@test.com',
            'password' => 'Password1!',
        ]);

        $response = $this->postJson('/api/v1/auth/login', [
            'email' => 'cashier@test.com',
            'password' => 'Password1!',
            'tenant_id' => $tenant->id,
        ]);

        $response->assertOk()
            ->assertJsonPath('success', true)
            ->assertJsonStructure(['data' => ['token', 'user', 'requires_2fa']]);
    }

    public function test_login_fails_with_bad_password(): void
    {
        $tenant = Tenant::factory()->create();
        User::factory()->create([
            'tenant_id' => $tenant->id,
            'email' => 'cashier@test.com',
            'password' => 'Password1!',
        ]);

        $response = $this->postJson('/api/v1/auth/login', [
            'email' => 'cashier@test.com',
            'password' => 'wrong',
        ]);

        $response->assertStatus(422);
    }

    public function test_authenticated_user_can_fetch_profile(): void
    {
        $tenant = Tenant::factory()->create();
        $user = User::factory()->create(['tenant_id' => $tenant->id]);

        $response = $this->actingAs($user, 'sanctum')
            ->getJson('/api/v1/auth/me');

        $response->assertOk()->assertJsonPath('data.email', $user->email);
    }

    public function test_owner_can_create_product_in_tenant_context(): void
    {
        $tenant = Tenant::factory()->create();
        $user = User::factory()->owner()->create(['tenant_id' => $tenant->id]);

        $response = $this->actingAs($user, 'sanctum')
            ->withHeader('X-Tenant-ID', (string) $tenant->id)
            ->postJson('/api/v1/core/products', [
                'name' => 'Widget',
                'selling_price' => 10.5,
                'cost_price' => 5,
            ]);

        $response->assertCreated()->assertJsonPath('data.name', 'Widget');
        $this->assertDatabaseHas('products', ['name' => 'Widget', 'tenant_id' => $tenant->id]);
    }
}
