<?php
namespace Wuchenhao\LaravelShop\Wap\Member\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    protected $table = "sys_user";
    protected $fillable = [
        'nickname', 'weixin_openid', 'image_head',
    ];
}