<?php

namespace App\Core\Api;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Pagination\AbstractPaginator;

final class ApiResponse
{
    public static function success(
        mixed $data = null,
        ?string $message = null,
        int $status = 200,
        array $meta = [],
    ): JsonResponse {
        $payload = [
            'success' => true,
            'message' => $message,
            'data' => self::transformData($data),
        ];

        if (! empty($meta)) {
            $payload['meta'] = $meta;
        }

        if ($data instanceof AbstractPaginator) {
            $payload['meta'] = array_merge($meta, [
                'pagination' => [
                    'current_page' => $data->currentPage(),
                    'per_page' => $data->perPage(),
                    'total' => $data->total(),
                    'last_page' => $data->lastPage(),
                ],
            ]);
            $payload['data'] = $data->items();
        }

        return response()->json($payload, $status);
    }

    public static function created(mixed $data = null, ?string $message = 'Resource created successfully.'): JsonResponse
    {
        return self::success($data, $message, 201);
    }

    public static function noContent(): JsonResponse
    {
        return response()->json(null, 204);
    }

    public static function error(
        string $message,
        int $status = 400,
        ?string $code = null,
        array $errors = [],
    ): JsonResponse {
        $payload = [
            'success' => false,
            'message' => $message,
        ];

        if ($code !== null) {
            $payload['code'] = $code;
        }

        if (! empty($errors)) {
            $payload['errors'] = $errors;
        }

        return response()->json($payload, $status);
    }

    public static function unauthorized(?string $message = 'Unauthorized.'): JsonResponse
    {
        return self::error($message, 401, 'UNAUTHORIZED');
    }

    public static function forbidden(?string $message = 'Forbidden.'): JsonResponse
    {
        return self::error($message, 403, 'FORBIDDEN');
    }

    public static function notFound(?string $message = 'Resource not found.'): JsonResponse
    {
        return self::error($message, 404, 'NOT_FOUND');
    }

    public static function validationError(array $errors, ?string $message = 'Validation failed.'): JsonResponse
    {
        return self::error($message, 422, 'VALIDATION_ERROR', $errors);
    }

    private static function transformData(mixed $data): mixed
    {
        if ($data instanceof JsonResource || $data instanceof ResourceCollection) {
            return $data->resolve();
        }

        return $data;
    }
}
