<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use App\Helpers\CacheHelper;
use Illuminate\Support\Facades\Cache;

final readonly class CacheMiddleware
{
    public function handle($request, \Closure $next)
    {
        if ('production' !== config('app.env')) {
            return $next($request);
        }

        return Cache::tags(['item'])
            ->remember(
                CacheHelper::generateRouteKey($request->url()),
                config('cache.route.ttl'),
                static fn () => $next($request));
    }
}
