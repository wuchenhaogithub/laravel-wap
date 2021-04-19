<?php

namespace Wuchenhao\LaravelShop\Data\Goods\Providers;

use Illuminate\Support\Arr;
use Illuminate\Support\ServiceProvider;
use Wuchenhao\LaravelShop\Data\Goods\Models\Category;
use Wuchenhao\LaravelShop\Data\Goods\Observers\CategoryObserver;

class GoodsProvider extends ServiceProvider
{
    public function register()
    {
        $this->GoodsMergeConfigFrom();
    }

    protected function loadObserver(){
        Category::observe(CategoryObserver::class);
    }


    public function boot()
    {
        $this->loadGoodsConfig();
        $this->loadMigrations();
        $this->loadObserver();
    }

    public function loadMigrations()
    {
        if ($this->app->runningInConsole()) {
            $this->loadMigrationsFrom(__DIR__.'/../Database/migrations');
        }
    }

    protected function loadGoodsConfig()
    {
        // 根据默认连接的信息去database.php配置分属于goods组件的连接信息
        config(
            Arr::dot(
                config('database.connections.' . config('data.goods.database.connection.type'), []),
                'database.connections.' . config('data.goods.database.connection.name') . '.')
        );
        // 在把goods组件的单独信息 放到 database中的goods连接的信息
        config(
            Arr::dot(
                config('data.goods.database.'.config('data.goods.database.connection.name'), []),
                'database.connections.'.config('data.goods.database.connection.name').'.')
        );
    }

    protected function GoodsMergeConfigFrom(){
        $this->mergeConfigFrom(
            __DIR__.'/../Config/goods.php', 'data.goods'
        );
    }

}
