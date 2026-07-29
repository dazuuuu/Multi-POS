<?php

namespace App\Public\Components\Shared;

class Footer
{
    public static function render(): string
    {
        $year = date('Y');
        return <<<HTML
        <footer class="site-footer">
            <div class="container">
                <p>&copy; {$year} Multi-POS — Multi-tenant SaaS Point of Sale Platform</p>
            </div>
        </footer>
        HTML;
    }
}
