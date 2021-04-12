<?php
namespace Wuchenhao\LaravelShop\Wap\Goods\Providers;


use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class GoodsServiceProvider extends ServiceProvider{
    protected $commands =[];
    protected $routeMiddleware = [];
    protected $middlewareGroups = [];

    /**
     * @author: Wu ChenHao
     * @Time: 2021/4/6 18:43
     */
    public function register()
    {
        $this->registerRoutes();
        $this->mergeConfigFrom(__DIR__ . '/../Config/config.php','wap.goods');//加载config
        $this->registerPublishing();
        $this->registerRouteMiddleware();
    }

    public function registerPublishing(){
        $source = realpath(__DIR__.'/../Resources/assets');
        if ($this->app->runningInConsole()) {
            $this->publishes([$source => public_path('vendor/wuchenhao/laravel-wap-shop/')], 'laravel-shop-wap-goods-assets');
        }
    }

    protected function registerRouteMiddleware()
    {
        foreach ($this->middlewareGroups as $key => $middleware) {
            $this->app['router']->middlewareGroup($key, $middleware);
        }
        foreach ($this->routeMiddleware as $key => $middleware) {
            $this->app['router']->aliasMiddleware($key, $middleware);
        }
    }
    public function boot()
    {
        $this->loadMigrations();
        $this->loadCommands();
        $this->loadViewFrom();
    }

    private function loadViewFrom(){
        $this->loadViewsFrom(__DIR__.'/../Resources/views/','wap.goods');
    }

    private function loadMigrations(){
        $this->loadMigrationsFrom(__DIR__.'/../Database/migrations/');
    }
    private function loadCommands(){
        $this->commands($this->commands);
    }
    private function registerRoutes()
    {
        Route::group($this->routeConfiguration(), function () {
            $this->loadRoutesFrom($this->routesPath());
        });
    }
    protected function routesPath()
    {
        return __DIR__ . '/../Http/routes.php';
    }
    protected function routeConfiguration(){
        return [
            // 'domain' => config('telescope.domain', null),
            'namespace' => 'Wuchenhao\LaravelShop\Wap\Goods\Http\Controllers',
            'prefix' => 'wap/goods',
            'middleware' => 'web',
        ];
    }
}