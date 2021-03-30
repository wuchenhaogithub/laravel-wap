<?php
namespace Wuchenhao\LaravelShop\Wap\Member\Providers;

use Illuminate\Foundation\Application as LaravelApplication;
use Illuminate\Support\Arr;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class MemberServiceProvider extends ServiceProvider{

    //加载组件中的自定义命令
    protected $commands =[
        \Wuchenhao\LaravelShop\Wap\Member\Console\Commands\InstallCommand::class
    ];

    //组件中需要加载的中间件
    protected $routeMiddleware = [
        'wechat.oauth'=>\Overtrue\LaravelWeChat\Middleware\OAuthAuthenticate::class
    ];
    protected $middlewareGroups = [];

    public function register()
    {
        $this->registerRoutes();
        $this->mergeConfigFrom(__DIR__ . '/../Config/Member.php','wap.member');//加载config
        $this->registerRouteMiddleware();
        $this->registerPublishing();

    }
    /**
     * 注册生成配置文件
     * --   [当前组件的配置文件路径 => 这个配置复制那个目录] , 文件标识
     * --    1. 不填就是默认的地址 config_path 的路径 发布配置文件名不会改变
     * --    2. 不带后缀就是一个文件夹,否则是文件
     * @author: Wu ChenHao
     * @Time: 2021/3/26 15:12
     */
    public function registerPublishing(){
        $source = realpath(__DIR__.'/../Config');
        if ($this->app->runningInConsole()) {
            $this->publishes([$source => config_path('wap')], 'laravel-shop-wap-member-config');
        }
    }
    /**
     * Register the config for publishing
     */
    public function boot()
    {
        $this->loadMemberAuthConfig();
        $this->loadMigrations();
        $this->loadCommands();
    }

    /**
     * 加载数据填充文件
     * @author: Wu ChenHao
     * @Time: 2021/3/29 10:43
     */
    private function loadMigrations(){
        $this->loadMigrationsFrom(__DIR__.'/../Database/migrations/');
    }

    /**
     * 加载组件中的自定义命令
     * @author: Wu ChenHao
     * @Time: 2021/3/29 17:11
     */
    private function loadCommands(){
        $this->commands($this->commands);
    }

    //修改wep config 配置路径
    private function loadMemberAuthConfig(){
        config(Arr::dot(config('wap.member.wechat', []), 'wechat.'));
        config(Arr::dot(config('wap.member.auth', []), 'auth.'));
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
    /**
     * 注册加载中间件
     * @author: Wu ChenHao
     * @Time: 2021/3/24 14:41
     */
    protected function registerRouteMiddleware()
    {
        foreach ($this->middlewareGroups as $key => $middleware) {
            $this->app['router']->middlewareGroup($key, $middleware);
        }
        foreach ($this->routeMiddleware as $key => $middleware) {
            $this->app['router']->aliasMiddleware($key, $middleware);
        }
    }

    protected function routeConfiguration(){
        return [
            // 定义访问路由的域名
            // 'domain' => config('telescope.domain', null),
            'namespace' => 'Wuchenhao\LaravelShop\Wap\Member\Http\Controllers',
            'prefix' => 'wap/member',
            'middleware' => 'web',
        ];
    }
}