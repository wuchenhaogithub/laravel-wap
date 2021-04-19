<?php

namespace Wuchenhao\LaravelShop\Data\Goods\Providers;

use Illuminate\Support\ServiceProvider;

class GoodsProvider extends ServiceProvider
{
    public function register()
    {
    }

    public function boot()
    {
        $this->loadMigrations();
    }

    public function loadMigrations()
    {
        if ($this->app->runningInConsole()) {
            $this->loadMigrationsFrom(__DIR__.'/../Database/migrations');
        }
    }

}
