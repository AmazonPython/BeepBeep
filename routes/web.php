<?php

use Illuminate\Support\Facades\Route;

//世界大厅 单动作控制器注册路由时，无需指定方法
Route::get('/explore', 'ExploreController');

//用户信息
Route::get('/profiles/{user}', 'ProfileController@show')->name('profile');

//使用中间件登录验证，访客不允许访问
Route::middleware('auth')->group(function () {
    //个人主页
    Route::get('/', 'BeepController@index')->name('home');//路由命名，使用route()访问

    //发送推文
    Route::post('/beeps', 'BeepController@store');
    //删除推文
    Route::delete('/beeps/{beep}', 'BeepController@destroy');

    //编辑个人信息
    Route::get('/profiles/{user}/edit', 'ProfileController@edit');
    Route::patch('/profiles/{user}', 'ProfileController@update');

    //关注与取消关注 用户
    Route::post('/profiles/{user}/follow', 'FollowController@store')->name('follow');

    //喜欢与不喜欢推文
    Route::post('/beeps/{beep}/like', 'BeepLikesController@store');
    Route::delete('/beeps/{beep}/like', 'BeepLikesController@destroy');
});

Auth::routes();
