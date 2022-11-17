<?php

namespace App\Providers;

use App\Facades\MonCash\HTTP;
use App\Services\MonCash\APIService;
use App\Services\MonCash\AuthCachedService;
use App\Services\MonCash\AuthService;
use App\Services\MonCash\HTTPService;
use App\Services\MonCash\OrderIdService;
use App\Services\MonCash\OrderIdUUIDService;
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
        $this->app->singleton(HTTPService::class, function () {
            return new HTTPService();
        });

        $this->app->singleton(APIService::class, function () {
            return new APIService();
        });

        $this->app->singleton(AuthService::class, function () {
            return new AuthCachedService();
        });

        $this->app->bind(OrderIdService::class, function () {
            return new OrderIdUUIDService();
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
