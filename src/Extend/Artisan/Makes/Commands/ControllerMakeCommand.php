<?php
namespace Wuchenhao\LaravelShop\Extend\Artisan\Makes\Commands;

use Illuminate\Routing\Console\ControllerMakeCommand as command;
use Symfony\Component\Console\Input\InputArgument;

class ControllerMakeCommand extends command {

    use GeneratorCommand;
    protected $name = 'shop-make:controller';

    protected function getDefaultNamespace($rootNamespace){
        return $rootNamespace.'\\'.$this->getPackageInput().'\Http\Controllers';
    }


    protected function getPackageInput()
    {
        return trim($this->argument('package'));
    }


    protected function getArguments()
    {
        return [
            ['package', InputArgument::REQUIRED, 'The package of the class'],
            ['name', InputArgument::REQUIRED, 'The name of the class'],
        ];
    }

}