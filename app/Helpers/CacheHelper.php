<?php

declare(strict_types=1);

namespace App\Helpers;

final class CacheHelper
{
    public static function generateRouteKey(string $url): string
    {
        return "request|{$url}";
    }
}
