<?php

namespace App\Backend\Controllers;

class BaseController
{
    protected function view(string $template, array $data = []): string
    {
        extract($data);

        ob_start();
        require \FilePaths::backendPath('templates/' . $template . '.php');
        return ob_get_clean();
    }

    protected function layout(string $content, array $data = []): string
    {
        return $this->view('layouts/main', array_merge($data, ['content' => $content]));
    }
}
