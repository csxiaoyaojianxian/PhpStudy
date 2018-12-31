<?php
// app/Http/Controllers

// 通过artisan命令行来自动生成控制器结构代码
// $ php artisan make:controller <控制器名(大驼峰) + Controller>

// $ php artisan make:controller Admin/TestController

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request; // 命名空间三元素：常量、方法、类

class TestController extends Controller
{
    // 测试控制器路由的使用
    public function test1 () {
    	// 输出任意信息
    	phpinfo();
    }
}
// 对应的路由见《路由》一节
// 控制器路由写法  控制器@方法
// Route::get('/test/test1','TestController@test1');
// Route::get('/admin/test/test1','Admin\TestController@index');
    