<?php

/**
 * routes/web.php 配置文件中配置路由
 */
/*
Route::get($uri, $callback);
Route::post($uri, $callback);
Route::put($uri, $callback);
Route::patch($uri, $callback);
Route::delete($uri, $callback);
Route::options($uri, $callback);
*/
//根路由
Route::get('/', function () {
    echo 'hello world';
});

// match 响应多个HTTP请求
Route::match(['get', 'post'], '/', function () {});
// any 响应所有HTTP请求
Route::any('foo', function () {});

// 必选参数
Route::any('/testParam1/{id}',function($id){
	echo "id=" . $id;
});
// 可选参数
Route::any('/testParam2/{id?}',function($id = 0){
	echo "id=" . $id;
});
// 通过 ? 形式传递get参数  localhost/testParam3?id=1
Route::any('/testParam3',function(){
	echo "id=" . $_GET['id'];
});

// 路由别名
// 查看系统已经有的路由
// $ php artisan route:list
Route::any('/test/path',function(){
	echo "id=" . $_GET['id'];
}) -> name('testName'); // 设置名为testName的路由

// 路由群组
Route::group(['prefix' => 'home/test'], function () {
	Route::get('add','TestController@add'); // 匹配 "/home/test/add" URL
	Route::get('del','TestController@del');
	Route::get('update','TestController@update');
	Route::get('select','TestController@select');
	Route::get('test',function(){
        // 匹配 "/home/test/test" URL
    });
});

// 控制器路由写法  控制器@方法
Route::get('/test/test1','TestController@test1');
Route::get('/admin/test/test1','Admin\TestController@index');
