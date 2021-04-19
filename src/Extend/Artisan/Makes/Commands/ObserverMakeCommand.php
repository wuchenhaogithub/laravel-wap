<?php
namespace Wuchenhao\LaravelShop\Extend\Artisan\Makes\Commands;
use Illuminate\Foundation\Console\ObserverMakeCommand as command;
use Illuminate\Support\Str;
class ObserverMakeCommand extends command{

    // php artisan shop-make:observer Data/Goods CategoryObserver --model=Category
    use GeneratorCommand;
    protected $name = 'shop-make:observer';
    protected $defaultNamespace = "\Observers";


    protected function replaceModel($stub, $model)
    {
        $model = str_replace('/', '\\', $model);

        $namespaceModel = $this->rootNamespace().'\\'.$this->getPackageInput().'\\'.'Models\\'.$model;

        if (Str::startsWith($model, '\\')) {
            $stub = str_replace('NamespacedDummyModel', trim($model, '\\'), $stub);
        } else {
            $stub = str_replace('NamespacedDummyModel', $namespaceModel, $stub);
        }

        $stub = str_replace(
            "use {$namespaceModel};\nuse {$namespaceModel};", "use {$namespaceModel};", $stub
        );

        $model = class_basename(trim($model, '\\'));

        $stub = str_replace('DocDummyModel', Str::snake($model, ' '), $stub);

        $stub = str_replace('DummyModel', $model, $stub);

        return str_replace('dummyModel', Str::camel($model), $stub);
    }


}