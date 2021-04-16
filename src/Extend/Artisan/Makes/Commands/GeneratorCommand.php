<?php

namespace Wuchenhao\LaravelShop\Extend\Artisan\Makes\Commands;

use Illuminate\Support\Str;
use Symfony\Component\Console\Input\InputArgument;

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

    /**
     * 重写文件路径
     * @param $rootNamespace
     * @return string
     * @author: Wu ChenHao
     * @Time: 2021/4/15 11:39
     */
    protected function getDefaultNamespace($rootNamespace){
        return $rootNamespace.'\\'.$this->getPackageInput().$this->defaultNamespace;
    }

    /**
     * 获取package 参数
     * @return string|string[]
     * @author: Wu ChenHao
     * @Time: 2021/4/15 11:36
     */
    protected function getPackageInput()
    {
        return str_replace('/','\\',trim($this->argument('package')));
    }


    protected function getArguments()
    {
        return [
            ['package', InputArgument::REQUIRED, 'The package of the class'],
            ['name', InputArgument::REQUIRED, 'The name of the class'],
        ];
    }

    /**
     * 重写 替换模版存根的名称空间。
     * @param $stub
     * @param $name
     * @return $this
     * @author: Wu ChenHao
     * @Time: 2021/4/15 11:32
     */
    protected function replaceNamespace(&$stub, $name)
    {
        $searches = [
            ['DummyNamespace', 'DummyRootNamespace', 'NamespacedDummyUserModel'],
            ['{{ namespace }}', '{{ rootNamespace }}', '{{ namespacedUserModel }}'],
            ['{{namespace}}', '{{rootNamespace}}', '{{namespacedUserModel}}'],
        ];
        foreach ($searches as $search) {
            $stub = str_replace(
                $search,
                [$this->getNamespace($name), $this->rootNamespace().'\\'.$this->getPackageInput().'\\', $this->userProviderModel()], //重新生成 命名空间
                $stub
            );
        }
        return $this;
    }
}
