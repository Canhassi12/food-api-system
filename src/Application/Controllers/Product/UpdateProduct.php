<?php

namespace Truckpag\Application\Controllers\Product;

use Truckpag\Domain\Entities\ProductEntity;
use Truckpag\Domain\Repositories\ProductRepository;

class UpdateProduct
{
    public function __construct(private readonly ProductRepository $repository)
    {
    }

    public function updateOutdatedProduct(int $code, array $product): ProductEntity
    {
        return $this->repository->updateProductByCode($code, $product);
    }

}
