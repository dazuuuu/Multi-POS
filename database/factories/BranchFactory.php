<?php

namespace Database\Factories;

use App\Models\Branch;
use App\Models\Tenant;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Branch>
 */
class BranchFactory extends Factory
{
    protected $model = Branch::class;

    public function definition(): array
    {
        return [
            'tenant_id' => Tenant::factory(),
            'name' => fake()->city().' Branch',
            'code' => strtoupper(fake()->unique()->bothify('BR-###')),
            'address' => fake()->address(),
            'phone' => fake()->phoneNumber(),
            'is_main' => false,
            'is_active' => true,
        ];
    }

    public function main(): static
    {
        return $this->state(fn () => ['is_main' => true, 'code' => 'MAIN']);
    }
}
