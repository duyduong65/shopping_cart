<?php

namespace App\Providers;

use App\Http\Repositories\eloquent\ProductEloquent;
use App\Http\Repositories\ProductRepositoriesInterface;
use App\Http\Services\implement\ProductServices;
use App\Http\Services\ProductServicesInterface;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->singleton(ProductServicesInterface::class,ProductServices::class);
        $this->app->singleton(ProductRepositoriesInterface::class,ProductEloquent::class);
    }
}
