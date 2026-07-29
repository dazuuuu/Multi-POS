<?php

namespace App\Http\Middleware;

use App\Core\Api\ApiResponse;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureOwner
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        if (! $user || ! $user->is_owner) {
            return ApiResponse::forbidden('Owner access required.');
        }

        return $next($request);
    }
}
