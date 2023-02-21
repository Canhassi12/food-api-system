<?php

namespace Truckpag\Domain\Services\API;

use Carbon\Carbon;

class CronService
{
    public function getLastTime(): string
    {
        return Carbon::createFromTimestamp(
            filemtime('app/Console/Commands/OpenFoodFactCron.php')
        )->toDateTimeString();
    }
}
