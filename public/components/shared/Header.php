<?php

namespace App\Public\Components\Shared;

class Header
{
    public static function render(string $title): string
    {
        return sprintf('<header><h2>%s</h2></header>', htmlspecialchars($title));
    }
}
