<?php
return [
  'wechat'=>[
      'official_account' => [
          'default' => [
              'app_id'  => 'wxf4ea2aa3c36604ab',         // AppID
              'secret'  => '7cc2c53612720cfe318532ab74f21efc',    // AppSecret
              'token'   => env('WECHAT_OFFICIAL_ACCOUNT_TOKEN', 'your-token'),           // Token
              'aes_key' => env('WECHAT_OFFICIAL_ACCOUNT_AES_KEY', ''),                 // EncodingAESKey
              /*
               * OAuth 配置
               *
               * scopes：公众平台（snsapi_userinfo / snsapi_base），开放平台：snsapi_login
               * callback：OAuth授权完成后的回调页地址(如果使用中间件，则随便填写。。。)
               * enforce_https：是否强制使用 HTTPS 跳转
               */
               'oauth'   => [
                   'scopes'        => array_map('trim', explode(',', env('WECHAT_OFFICIAL_ACCOUNT_OAUTH_SCOPES', 'snsapi_userinfo'))),
                   'callback'      => env('WECHAT_OFFICIAL_ACCOUNT_OAUTH_CALLBACK', '/examples/oauth_callback.php'),
                   'enforce_https' => FALSE,
               ],
          ],
      ],
  ],
  'auth'=>[
      "controller"=>Wuchenhao\LaravelShop\Wap\Member\Http\Controllers\AuthorizationsController::class,
      "guard"=>"member",
      'guards' => [
          'member' => [
              'driver' => 'session',
              'provider' => 'member',
          ],
      ],
      'providers' => [
          'member' => [
              'driver' => 'eloquent',
              'model' => Wuchenhao\LaravelShop\Wap\Member\Models\User::class,
          ],
      ],

  ]



];
