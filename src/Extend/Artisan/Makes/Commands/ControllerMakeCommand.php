<?php
namespace Wuchenhao\LaravelShop\Extend\Artisan\Makes\Commands;

use Illuminate\Routing\Console\ControllerMakeCommand as command;

class ControllerMakeCommand extends command {

    use GeneratorCommand;
    protected $name = 'shop-make:controller';
    protected $defaultNamespace = '\Http\Controllers';
}