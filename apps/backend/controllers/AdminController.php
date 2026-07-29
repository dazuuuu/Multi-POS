<?php

namespace App\Backend\Controllers;

class AdminController extends BaseController
{
    public function dashboard(): string
    {
        return $this->view('admin/dashboard', [
            'title' => 'Admin Dashboard',
        ]);
    }
}
