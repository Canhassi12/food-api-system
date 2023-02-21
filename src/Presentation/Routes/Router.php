<?php

namespace Truckpag\Presentation\Routes;

use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Route;
use Truckpag\Presentation\Controllers\Product\ProductController;

class Router extends RouteServiceProvider
{
    public function boot(): void
    {
        parent::boot();

        Route::get('/', [ProductController::class, 'getDetails'])->name('getDetails');

        Route::middleware(['api'])->prefix('products')->group(function () {
            Route::get('/{code}', [ProductController::class, 'getProduct'])->name('getProduct');
            Route::get('/', [ProductController::class, 'getProducts'])->name('getProducts');
            Route::delete('/{code}', [ProductController::class, 'changeProductStatus'])->name('changeStatus');
            Route::put('/{code}', [ProductController::class, 'updateProduct'])->name('updateProduct');
        });
    }
}
