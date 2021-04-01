<?php
namespace Wuchenhao\LaravelShop\Wap\Member\Http\Controllers;

use Illuminate\Http\Request;
use Wuchenhao\LaravelShop\Wap\Member\Facades\Member;
use Wuchenhao\LaravelShop\Wap\Member\Models\User;

class WechatMenusController extends Controller{


    public function index(){
        $app = app('wechat.official_account');
        $buttons = [
            [
                "type" => "click",
                "name" => "今日歌曲",
                "key"  => "V1001_TODAY_MUSIC"
            ],
            [
                "name"       => "菜单",
                "sub_button" => [
                    [
                        "type" => "view",
                        "name" => "搜索",
                        "url"  => "http://www.baidu.com/"
                    ],
                    [
                        "type" => "view",
                        "name" => "test-shop",
                        "url"  => "http://5ev4vy.natappfree.cc/wap/goods"
                    ]
                ],
            ],
        ];
       return $app->menu->create($buttons);
    }

}