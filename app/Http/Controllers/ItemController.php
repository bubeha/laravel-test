<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Resources\ItemResource;
use App\Repositories\Item\ItemRepository;
use Illuminate\Config\Repository;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

final readonly class ItemController
{
    public function __construct(private ItemRepository $repository, private Repository $config)
    {
    }

    public function __invoke(Request $request): JsonResource
    {
        $perPage = (int)$request->get('per_page', $this->config->get('pagination.per_page'));

        return ItemResource::collection($this->repository->paginate($perPage));
    }
}
