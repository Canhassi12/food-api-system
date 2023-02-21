<?php

namespace Truckpag\Domain\Repositories;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Truckpag\Domain\Entities\ProductEntity;

interface ProductRepository
{
    public function paginate(int $perPage = 100): LengthAwarePaginator;

    public function getProductByCode(int $code): ProductEntity;

    public function changeStatusToTrash(int $code): void;

    public function updateProductByCode(int $code, array $product): ProductEntity;
}
