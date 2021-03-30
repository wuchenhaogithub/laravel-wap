<?php

namespace Wuchenhao\LaravelShop\Wap\Member\Console\Commands;

use Illuminate\Console\Command;

class InstallCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'wap-member:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install the wap-member package';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 自定义执行命令
     * @author: Wu ChenHao
     * @Time: 2021/3/29 17:24
     */
    public function handle()
    {
        $this->call('migrate');  //合并迁移文件
        $this->call('vendor:publish',[
//            "--provider=Wuchenhao\LaravelShop\Wap\Member\Providers\MemberServiceProvider"
        "--provider"=>"Wuchenhao\LaravelShop\Wap\Member\Providers\MemberServiceProvider"
        ]);//加载组件，生成配置文件
    }
}
