<?php
Route::get('/',function (){
    return 'this is shops';
})->middleware('wechat.oauth');
