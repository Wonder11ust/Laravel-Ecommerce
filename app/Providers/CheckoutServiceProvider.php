<?php

namespace App\Providers;

use App\Services\CheckoutService;
use App\Services\Implementation\CheckoutServiceImpl;
use Illuminate\Support\ServiceProvider;

class CheckoutServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(CheckoutService::class,CheckoutServiceImpl::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
