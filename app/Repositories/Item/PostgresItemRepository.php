<?php

declare(strict_types=1);

namespace App\Repositories\Item;

use App\Models\Item;
use Illuminate\Contracts\Pagination\Paginator;

final class PostgresItemRepository implements ItemRepository
{
    public function paginate(int $perPage = 10): Paginator
    {
        return Item::query()->simplePaginate($perPage);
    }
}
