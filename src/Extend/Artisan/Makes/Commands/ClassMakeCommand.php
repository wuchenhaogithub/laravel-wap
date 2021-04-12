<?php

namespace Wuchenhao\LaravelShop\Extend\Artisan\Makes\Commands;

use Illuminate\Console\GeneratorCommand;
use Illuminate\Support\Str;

class ClassMakeCommand extends GeneratorCommand
{
    protected $signature = 'make:class {name}';

    protected $description = '组件文件创建测试';

    protected $packagePath = __DIR__.'/../../../..';
    protected function rootNamespace(){
        return "Wuchenhao\LaravelShop";
    }

    protected function getPath($name){
        $name = Str::replaceFirst($this->rootNamespace(), '', $name);

        return $this->packagePath.'/'.str_replace('\\', '/', $name).'.php';
    }

    protected function getStub()
    {
        return __DIR__.'/../stub/Class.stub';
    }
}
