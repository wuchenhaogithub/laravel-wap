<?php
namespace Wuchenhao\LaravelShop\Wap\Member\Facades;

use Illuminate\Support\Facades\Facade;

class Member extends Facade{
    protected static function  getFacadeAccessor(){
        return \Wuchenhao\LaravelShop\Wap\Member\Member::class;
    }
}

