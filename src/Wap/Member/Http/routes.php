<?php
Route::get('/wechatStore',"AuthorizationsController@wechatStore")->middleware('wechat.oauth');
Route::get('/menus',"WechatMenusController@index");
