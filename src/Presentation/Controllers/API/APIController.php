<?php

namespace Truckpag\Presentation\Controllers\API;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Process\Process;
use Truckpag\Application\Controllers\API\GetLastCronTime;
use Truckpag\Application\Controllers\API\GetMemoryUsed;
use Truckpag\Application\Controllers\API\GetUptime;
use Truckpag\Domain\Exceptions\ProcessException;

class APIController extends Controller
{
    public function __construct(
        private readonly GetMemoryUsed $getMemoryUsed,
        private readonly GetLastCronTime $getLastCronTime,
        private readonly GetUptime $getUptime
    )
    {
    }

    /**
     * @throws ProcessException
     */
    public function getDetails(): JsonResponse
    {
        $last_cron = $this->getLastCronTime->handle();

        $uptime = $this->getUptime->handle();

        $memory = $this->getMemoryUsed->handle();

        return response()->json([
            'last_cron' => $last_cron,
            'uptime' => $uptime,
            'total_memory' => $memory[0],
            'used_memory' => $memory[1],
        ]);
    }
}
