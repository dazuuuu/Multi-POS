<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\JsonResponse;

class HealthController extends ApiController
{
    public function __invoke(): JsonResponse
    {
        return $this->success([
            'status' => 'healthy',
            'application' => config('app.name'),
            'environment' => app()->environment(),
            'api_version' => config('api.version'),
            'timestamp' => now()->toIso8601String(),
        ], 'API is operational.');
    }
}
