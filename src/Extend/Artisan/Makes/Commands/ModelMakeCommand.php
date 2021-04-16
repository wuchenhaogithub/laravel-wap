<?php
namespace Wuchenhao\LaravelShop\Extend\Artisan\Makes\Commands;

use Illuminate\Foundation\Console\ModelMakeCommand as command;
class ModelMakeCommand extends command {

    use GeneratorCommand;
    protected $name = 'shop-make:model';
    protected $defaultNamespace = "\Models"; //获取路径

}