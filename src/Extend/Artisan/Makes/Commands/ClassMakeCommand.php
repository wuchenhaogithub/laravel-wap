<?php

namespace Wuchenhao\LaravelShop\Extend\Artisan\Makes\Commands;

use Illuminate\Console\GeneratorCommand as command;
use Illuminate\Support\Str;

class ClassMakeCommand extends command
{
    use GeneratorCommand;
    protected $signature = 'make:class {name}';

    protected $description = '组件文件创建测试';


    protected function getStub()
    {
        return __DIR__.'/../stub/Class.stub';
    }
}
