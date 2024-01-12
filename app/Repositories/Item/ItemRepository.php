<?php

namespace App\Repositories\Item;

use Illuminate\Contracts\Pagination\Paginator;

interface ItemRepository
{
    public function paginate(int $perPage = 10): Paginator;
}
