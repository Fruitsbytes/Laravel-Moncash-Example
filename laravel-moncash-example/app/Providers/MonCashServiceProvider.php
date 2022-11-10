<?php

namespace App\Providers;

use App\Services\MonCash\AuthService;
use App\Services\MonCash\HTTPService;
use Illuminate\Support\ServiceProvider;

class MonCashServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->singleton(HTTPService::class, function (){
            return new HTTPService();
        });
        $this->app->singleton(AuthService::class, function (){
            return new AuthService();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot(): void
    {
        //
    }
}
