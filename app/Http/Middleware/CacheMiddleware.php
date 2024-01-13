<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use App\Helpers\CacheHelper;
use Closure;
use Illuminate\Contracts\Cache\Repository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

final readonly class CacheMiddleware
{
    public function __construct(private Repository $repository)
    {
    }

    /**
     * @throws \Psr\SimpleCache\InvalidArgumentException
     */
    public function handle(Request $request, Closure $next)
    {
        if ('production' !== config('app.env')) {
            return $next($request);
        }

        $cacheKey = CacheHelper::generateRouteKey($request->fullUrl());

        if ($result = $this->repository->get($cacheKey)) {
            return $result;
        }

        $result = $next($request);

        if ($result instanceof JsonResponse) {
            $originalContent = $result->getOriginalContent();

            if (is_countable($originalContent) && count($originalContent) > 0) {
                $this->repository->put($cacheKey, $result, config('cache.route.ttl'));
            }
        }

        return $result;
    }
}
