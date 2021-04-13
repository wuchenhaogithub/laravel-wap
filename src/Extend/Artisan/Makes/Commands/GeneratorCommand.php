<?php

namespace Wuchenhao\LaravelShop\Extend\Artisan\Makes\Commands;

use Illuminate\Support\Str;

trait GeneratorCommand
{
    protected $packagePath = __DIR__.'/../../../..';
    protected function rootNamespace(){
        return "Wuchenhao\LaravelShop";
    }

    protected function getPath($name){
        $name = Str::replaceFirst($this->rootNamespace(), '', $name);
        return $this->packagePath.'/'.str_replace('\\', '/', $name).'.php';
    }
}
