<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Truckpag\Domain\Repositories\ProductRepository;
use Truckpag\Infrastructure\Repositories\Eloquent\ProductEloquentRepository;
use Truckpag\Presentation\Routes\Router;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->register(Router::class);
        $this->app->bind(ProductRepository::class, ProductEloquentRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
