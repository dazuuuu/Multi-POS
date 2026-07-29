<?php

namespace App\Backend\Controllers;

class BaseController
{
    protected function view(string $template, array $data = []): string
    {
        extract($data);

        ob_start();
        require dirname(__DIR__) . '/templates/' . $template . '.php';
        return ob_get_clean();
    }
}
