<?php

namespace Truckpag\Application\Controllers\API;

use Truckpag\Domain\Services\API\UptimeService;

class GetUptime
{
    public function __construct(private readonly UptimeService $service)
    {
    }

    public function handle(): false|null|string
    {
        return $this->service->getUptime();
    }
}
