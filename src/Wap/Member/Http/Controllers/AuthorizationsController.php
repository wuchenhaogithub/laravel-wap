<?php
namespace Wuchenhao\LaravelShop\Wap\Member\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Wuchenhao\LaravelShop\Wap\Member\Models\User;

class AuthorizationsController extends Controller{


    public function wechatStore(Request $request){
        $wechatUser = session('wechat.oauth_user.default');
        $user = User::where('weixin_openid',$wechatUser->getId())->first();
        if (!$user) {
            $user = User::create([
                "nickname" => $wechatUser->getName(),
                "weixin_openid" => $wechatUser->getId(),
                "image_head" => $wechatUser->avatar
            ]);
        }
       Auth::guard('member')->login($user);

        var_dump(Auth::guard('member')->check());
        return "通过";
    }

}