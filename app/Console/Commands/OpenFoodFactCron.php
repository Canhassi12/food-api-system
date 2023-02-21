<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Truckpag\Domain\Services\OpenFoodFact\CommandUpdateProducts;


class OpenFoodFactCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:products';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command runs once a day to update product files';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $updateProducts = new CommandUpdateProducts();
        Log::info("The update of products start now", [Carbon::now()]);
        $updateProducts->updateData();
        Log::info("The update has been completed", [Carbon::now()]);
    }
}
