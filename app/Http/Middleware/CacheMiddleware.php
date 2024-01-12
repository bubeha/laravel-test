<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use App\Helpers\CacheHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

final readonly class CacheMiddleware
{
    public function handle(Request $request, \Closure $next)
    {
        // todo resolve problem with caching empty response
        return Cache::tags(['item'])
            ->remember(
                CacheHelper::generateRouteKey($request->fullUrl()),
                config('cache.route.ttl'),
                static fn () => $next($request));
    }
}
