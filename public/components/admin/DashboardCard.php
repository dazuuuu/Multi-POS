<?php

namespace App\Public\Components\Admin;

class DashboardCard
{
    public static function render(string $title, string $value): string
    {
        return sprintf('<div class="card"><h3>%s</h3><p>%s</p></div>', htmlspecialchars($title), htmlspecialchars($value));
    }
}
