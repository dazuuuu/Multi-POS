<?php

namespace App\Http\Controllers\Api\V1\Tenancy;

use App\Http\Controllers\Api\V1\ApiController;
use App\Http\Requests\Api\V1\Tenancy\RegisterTenantRequest;
use App\Http\Resources\Api\V1\BranchResource;
use App\Http\Resources\Api\V1\TenantResource;
use App\Http\Resources\Api\V1\UserResource;
use App\Services\Tenancy\TenantRegistrationService;
use Illuminate\Http\JsonResponse;

class TenantRegistrationController extends ApiController
{
    public function __construct(
        private readonly TenantRegistrationService $registrationService,
    ) {}

    public function store(RegisterTenantRequest $request): JsonResponse
    {
        $result = $this->registrationService->register($request->validated());

        $token = $result['user']->createToken('registration')->plainTextToken;

        return $this->created([
            'tenant' => new TenantResource($result['tenant']),
            'branch' => new BranchResource($result['branch']),
            'user' => new UserResource($result['user']),
            'token' => $token,
            'token_type' => 'Bearer',
        ], 'Tenant registered successfully.');
    }
}
