<?php

namespace Tests\Feature\Api\V1;

use Tests\TestCase;

class ModulesEndpointTest extends TestCase
{
    public function test_modules_endpoint_lists_registered_modules(): void
    {
        $response = $this->getJson('/api/v1/modules');

        $response->assertOk()
            ->assertJsonStructure([
                'success',
                'data' => [
                    'modules',
                    'registered',
                ],
            ])
            ->assertJsonPath('data.registered.core', fn ($features) => is_array($features) && count($features) > 0);
    }
}
