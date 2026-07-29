<?php

namespace App\Public\Components\Shared;

use App\Backend\Services\SessionService;

class Header
{
    public static function render(string $title = 'Multi-POS'): string
    {
        $session = new SessionService();
        $user = $session->user();

        $authLinks = $user
            ? '<a href="/dashboard">Dashboard</a><a href="/logout">Logout</a>'
            : '<a href="/login">Login</a><a href="/register" class="btn btn-primary btn-sm">Get Started</a>';

        return <<<HTML
        <header class="site-header">
            <div class="container">
                <a href="/" class="logo">Multi<span>-POS</span></a>
                <nav class="nav-links">
                    <a href="/core">Core</a>
                    <a href="/industry">Industries</a>
                    {$authLinks}
                </nav>
            </div>
        </header>
        HTML;
    }
}
