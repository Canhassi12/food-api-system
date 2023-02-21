<?php

namespace Truckpag\Domain\Services\API;

class UptimeService
{
    public function getUptime(): false|null|string
    {
        return shell_exec('uptime -s');
    }
}
