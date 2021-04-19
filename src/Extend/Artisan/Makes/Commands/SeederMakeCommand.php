<?php
namespace Wuchenhao\LaravelShop\Extend\Artisan\Makes\Commands;

use Illuminate\Database\Console\Seeds\SeederMakeCommand as command;

class SeederMakeCommand extends command {

    use GeneratorCommand;
    protected $name = 'shop-make:seeder';
    /**
     * 重写getPath 设置填充文件目录
     * Get the destination class path.
     *
     * @param  string  $name
     * @return string
     */
    protected function getPath($name)
    {
        return $this->packagePath.'/'.$this->getPackageInput().'/Database/seeds/'.$name.'.php';
    }
}