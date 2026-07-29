<?php

namespace App\Backend\Helpers;

class ResponseHelper
{
    public static function json(array $data, int $status = 200): void
    {
        http_response_code($status);
        header('Content-Type: application/json');
        echo json_encode([
            'status' => $status,
            'data' => $data,
        ], JSON_PRETTY_PRINT);
    }

    public static function html(string $template, array $data = []): string
    {
        extract($data);
        ob_start();
        require \FilePaths::backendPath('templates/' . $template . '.php');
        return ob_get_clean();
    }

    public static function redirect(string $url): void
    {
        header('Location: ' . $url);
        exit;
    }
}
