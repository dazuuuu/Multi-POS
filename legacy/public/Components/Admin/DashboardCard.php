<?php

namespace App\Public\Components\Admin;

class DashboardCard
{
    public static function render(string $title, string $value, ?string $link = null): string
    {
        $content = sprintf(
            '<div class="stat-card"><div class="value">%s</div><div class="label">%s</div></div>',
            htmlspecialchars($value),
            htmlspecialchars($title)
        );

        if ($link) {
            return sprintf('<a href="%s" style="text-decoration:none;color:inherit;">%s</a>', htmlspecialchars($link), $content);
        }

        return $content;
    }
}
