<?php

namespace Truckpag\Application\Controllers\Product;

use Truckpag\Domain\Repositories\ProductRepository;

class ChangeStatus
{
    public function __construct(private readonly ProductRepository $repository)
    {
    }

    public function toTrash(int $code): void
    {
        $this->repository->changeStatusToTrash($code);
    }
}
