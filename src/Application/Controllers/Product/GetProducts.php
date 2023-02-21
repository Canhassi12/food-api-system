<?php

namespace Truckpag\Application\Controllers\Product;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Truckpag\Domain\Repositories\ProductRepository;

class GetProducts
{
    public function __construct(private readonly ProductRepository $repository)
    {
    }

    public function getProductsPaginated(): LengthAwarePaginator
    {
        return $this->repository->paginate();
    }
}
