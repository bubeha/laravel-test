<?php

declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Http\Resources\Json\ResourceCollection;

/**
 * @mixin Paginator
 */
final class PaginateResource extends ResourceCollection
{
    /**
     * @param Paginator $resource
     * @param class-string $collects
     */
    public function __construct(Paginator $resource, string $collects)
    {
        parent::__construct($resource);

        $this->collects = $collects;
    }

    public function toArray($request): array
    {
        return [
            'current_page' => $this->currentPage(),
            'data' => $this->collection,
            'first_page_url' => $this->url(1),
            'from' => $this->firstItem(),
            'next_page_url' => $this->nextPageUrl(),
            'path' => $this->url($this->currentPage()),
            'per_page' => $this->perPage(),
            'prev_page_url' => $this->previousPageUrl(),
            'to' => $this->lastItem(),
        ];
    }
}
