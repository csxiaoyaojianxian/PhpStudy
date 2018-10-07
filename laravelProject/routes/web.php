<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


/**
 * http请求: [get/post/put/delete/...]
 * @param [string] url路由地址
 * @param [closure] php处理程序 
 */
// 基本路由
Route::get('/test', function(){
    echo '基本路由...';
});

// 带必选参数的路由
Route::get('/testp/{param1}/content/{param2}', function($id,$content){
    echo "带必选参数的路由,id:{$id},content:{$content}...";
});

// 带可选参数的路由
Route::get('/testop/{param1?}', function($id=0){
    echo "带可选参数的路由,id:{$id}...";
});

// 单参数的正则约束
Route::get('/testrule/{param1}', function($id){
    echo "单参数的正则约束...";
})->where('param1','\d+');

// 多参数的正则约束
Route::get('/testrules/{name}/{age}', function($n,$a){
    echo "多参数的正则约束...name:$n,age:$a";
})->where(['name'=>'\w+', 'age'=>'\d+']);

// 路由到控制器方法
Route::get('/test/fn', 'TestController@lst');
Route::get('/user/lst', 'Test\UserController@lst');

// 路由分组
// Route::group
Route::match(['get','post'],'/',function(){
    // ...
});
Route::any('foo',function(){
    // ...
});

// 使用中间件
Route::get('/login', function () {
    session(['uid'=>100]);
    return 'login登录页面';
});
Route::get('/setting', function () {
    return 'setting路由...uid='.session('uid');
})->middleware('login');


