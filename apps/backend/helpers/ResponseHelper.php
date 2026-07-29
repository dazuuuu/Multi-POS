<?php

namespace App\Backend\Helpers;

class ResponseHelper
{
    public static function json(array $data, int $status = 200): array
    {
        return [
            'status' => $status,
            'data' => $data,
        ];
    }
}
