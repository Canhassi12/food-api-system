<?php

namespace Truckpag\Application\Controllers\Product;

use Truckpag\Domain\Entities\ProductEntity;
use Truckpag\Domain\Repositories\ProductRepository;

class GetProduct
{
    public function __construct(private readonly ProductRepository $repository)
    {
    }

    public function getProductByCode(int $code): ProductEntity
    {
        return $this->repository->getProductByCode($code);
    }
}
