<?php

namespace Truckpag\Application\Controllers\API;

use Truckpag\Domain\Services\API\CronService;

class GetLastCronTime
{
    public function __construct(private readonly CronService $service)
    {
    }

    public function handle(): string
    {
       return $this->service->getLastTime();
    }
}
