<?php

namespace Wuchenhao\LaravelShop\Extend\Artisan;

use Illuminate\Support\ServiceProvider;
use Wuchenhao\LaravelShop\Extend\Artisan\Makes\Commands\ClassMakeCommand;

class ArtisanProvider extends ServiceProvider
{
    protected $command = [
        ClassMakeCommand::class
    ];

    public function register()
    {
        $this->commands($this->command);
    }

    public function boot()
    {
    }
}
