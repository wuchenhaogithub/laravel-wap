<?php
namespace Wuchenhao\LaravelShop\Wap\Goods\Providers;


use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class GoodsServiceProvider extends ServiceProvider{

    public function register()
    {
        $this->registerRoutes();

    }

    /**
     * Register the config for publishing
     */
    public function boot()
    {
    }




    /**
     * 注册路由
     * @author: Wu ChenHao
     * @Time: 2021/3/30 14:50
     */
    private function registerRoutes()
    {
        Route::group($this->routeConfiguration(), function () {
            $this->loadRoutesFrom($this->configPath());
        });
    }
    /**
     * Set the config path
     * @return string
     */
    protected function configPath()
    {
        return __DIR__ . '/../Http/routes.php';
    }


    protected function routeConfiguration(){
        return [
            // 定义访问路由的域名
            // 'domain' => config('telescope.domain', null),
            'namespace' => 'Wuchenhao\LaravelShop\Wap\Goods\Http\Controllers',
            'prefix' => 'wap/goods',
            'middleware' => 'web',
        ];
    }
}