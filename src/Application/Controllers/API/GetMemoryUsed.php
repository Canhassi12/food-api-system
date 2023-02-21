<?php

namespace Truckpag\Application\Controllers\API;

use Truckpag\Domain\Exceptions\ProcessException;
use Truckpag\Domain\Services\API\MemoryService;

class GetMemoryUsed
{
    public function __construct(private readonly MemoryService $service)
    {
    }

    /**
     * @throws ProcessException
     */
    public function handle(): array
    {
        return $this->service->getMemory();
    }
}
