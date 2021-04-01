<?php
namespace Wuchenhao\LaravelShop\Wap\Member;
use Illuminate\Support\Facades\Auth;

class Member{
    private static $singleton = [];
    public static  function createSingleton(){
        if (isset(self::$singleton['Auth'])){
            return  self::$singleton['Auth'];
        }
        return  self::$singleton['Auth'] = Auth::guard(config('wap.member.guards'));
    }

    /**
     * 处理对象中不存在的方法
     * @param $method
     * @param $args
     * @return mixed
     * @throws \Exception
     * @author: Wu ChenHao
     * @Time: 2021/4/1 17:05
     */
    public  function __call($method, $args)
    {
        $class = self::createSingleton(); //获取调用的类
        if (!$class) {
            throw new \Exception("类没有找到 ".$class, 1);
        }
        return $class->{$method}(...$args); //执行
    }

}
