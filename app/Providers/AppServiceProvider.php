<?php

declare(strict_types=1);

namespace App\Providers;

use App\Repositories\Item\ItemRepository;
use App\Repositories\Item\PostgresItemRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public $bindings = [
        ItemRepository::class => PostgresItemRepository::class,
    ];

    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        //
    }
}
