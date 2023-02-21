<?php

namespace Truckpag\Domain\Services\API;

use Carbon\Carbon;
use Symfony\Component\Process\Process;
use Truckpag\Domain\Exceptions\ProcessException;

class MemoryService
{
    /**
     * @throws ProcessException
     */
    public function getMemory(): array
    {
        $process = new Process(['free', '-m']);
        $process->run();

        if (!$process->isSuccessful()) {
            throw ProcessException::ProcessFailed($process);
        }

        $memory = explode("\n", $process->getOutput())[1];
        $total_memory = explode(" ", $memory)[1];
        $used_memory = explode(" ", $memory)[2];

        return [$total_memory, $used_memory];
    }
}
