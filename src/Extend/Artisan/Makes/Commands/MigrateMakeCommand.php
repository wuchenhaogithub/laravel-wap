<?php
namespace Wuchenhao\LaravelShop\Extend\Artisan\Makes\Commands;

use Illuminate\Database\Console\Migrations\MigrateMakeCommand as Commands;

class MigrateMakeCommand extends Commands
{
    use GeneratorCommand;

    protected $signature = 'shop-make:migration {name : The name of the migration}
        {--create= : The table to be created}
        {--table= : The table to migrate}
        {--path= : The location where the migration file should be created}
        {--realpath : Indicate any provided migration file paths are pre-resolved absolute paths}
        {--fullpath : Output the full path of the migration}';

    /**
     * 设置迁移文件地址
     * @return string
     * @author: Wu ChenHao
     * @Time: 2021/4/16 10:44
     */
    protected function getMigrationPath(){
        if (!is_null($targetPath = $this->input->getOption('path'))){
            return $this->packagePath.'/'.$targetPath.'/Database/migrations';
        }else{
            parent::getMigrationPath();
        }
    }

}