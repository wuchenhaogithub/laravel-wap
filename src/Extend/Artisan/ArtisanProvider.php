<?php

namespace Wuchenhao\LaravelShop\Extend\Artisan;

use Illuminate\Support\ServiceProvider;
use Wuchenhao\LaravelShop\Extend\Artisan\Makes\Commands\ClassMakeCommand;
use Wuchenhao\LaravelShop\Extend\Artisan\Makes\Commands\MigrateMakeCommand;
use Wuchenhao\LaravelShop\Extend\Artisan\Makes\Commands\ModelMakeCommand;
use Wuchenhao\LaravelShop\Extend\Artisan\Makes\Commands\ControllerMakeCommand;
use Wuchenhao\LaravelShop\Extend\Artisan\Makes\Commands\SeederMakeCommand;

class ArtisanProvider extends ServiceProvider
{
    protected $command = [
        ClassMakeCommand::class,
        ModelMakeCommand::class,
        ControllerMakeCommand::class,
        MigrateMakeCommand::class,
        SeederMakeCommand::class,
    ];

    public function register()
    {
        $this->commands($this->command);
    }

    public function boot()
    {
    }
}
