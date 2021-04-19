<?php
namespace Wuchenhao\LaravelShop\Extend\Artisan\Makes\Commands;

use Illuminate\Foundation\Console\ModelMakeCommand as command;
use Illuminate\Support\Str;

class ModelMakeCommand extends command {

    use GeneratorCommand;
    protected $name = 'shop-make:model';
    protected $defaultNamespace = "\Models"; //获取路径


    protected function createMigration(){
        $table = Str::snake(Str::pluralStudly(class_basename($this->argument('name'))));

        if ($this->option('pivot')) {
            $table = Str::singular($table);
        }


        $this->call('shop-make:migration', [
            'name' => "create_{$table}_table",
            '--create' => $table,
            '--path'=>trim($this->argument('package')),
        ]);
    }




}