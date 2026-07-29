<?php

namespace App\Http\Controllers\Api\V1;

use App\Core\Api\ApiResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

abstract class ApiController extends Controller
{
    protected function success(mixed $data = null, ?string $message = null, int $status = 200, array $meta = []): JsonResponse
    {
        return ApiResponse::success($data, $message, $status, $meta);
    }

    protected function created(mixed $data = null, ?string $message = null): JsonResponse
    {
        return ApiResponse::created($data, $message);
    }

    protected function noContent(): JsonResponse
    {
        return ApiResponse::noContent();
    }

    protected function error(string $message, int $status = 400, ?string $code = null, array $errors = []): JsonResponse
    {
        return ApiResponse::error($message, $status, $code, $errors);
    }
}
