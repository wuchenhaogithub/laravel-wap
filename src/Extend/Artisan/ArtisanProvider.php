<?php

namespace Wuchenhao\LaravelShop\Extend\Artisan;

use Illuminate\Support\ServiceProvider;
use Wuchenhao\LaravelShop\Extend\Artisan\Makes\Commands\ClassMakeCommand;
use Wuchenhao\LaravelShop\Extend\Artisan\Makes\Commands\ModelMakeCommand;
use Wuchenhao\LaravelShop\Extend\Artisan\Makes\Commands\ControllerMakeCommand;

class ArtisanProvider extends ServiceProvider
{
    protected $command = [
        ClassMakeCommand::class,
        ModelMakeCommand::class,
        ControllerMakeCommand::class,
    ];

    public function register()
    {
        $this->commands($this->command);
    }

    public function boot()
    {
    }
}
