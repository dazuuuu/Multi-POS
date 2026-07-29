<?php

namespace Tests\Feature\Api\V1;

use Tests\TestCase;

class HealthCheckTest extends TestCase
{
    public function test_health_endpoint_returns_successful_response(): void
    {
        $response = $this->getJson('/api/v1/health');

        $response->assertOk()
            ->assertJsonStructure([
                'success',
                'message',
                'data' => [
                    'status',
                    'application',
                    'environment',
                    'api_version',
                    'timestamp',
                ],
            ])
            ->assertJson([
                'success' => true,
                'data' => [
                    'status' => 'healthy',
                    'api_version' => 'v1',
                ],
            ]);
    }

    public function test_health_endpoint_returns_json_content_type(): void
    {
        $response = $this->getJson('/api/v1/health');

        $response->assertHeader('Content-Type', 'application/json');
    }

    public function test_health_endpoint_includes_security_headers(): void
    {
        $response = $this->getJson('/api/v1/health');

        $response->assertHeader('X-Content-Type-Options', 'nosniff');
        $response->assertHeader('X-Frame-Options', 'DENY');
    }
}
