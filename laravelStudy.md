# laravel

## 1. 安装

```
$ composer -v create-project laravel/laravel laravelProject
```

## 2. 路由

```
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

// 路由分组
// Route::group

// 路由到控制器方法
Route::get('/test/fn', 'TestController@lst');
Route::match(['get','post'],'/',function(){
    // ...
});
Route::any('foo',function(){
    // ...
});
```

## 3. 控制器

### 3.1 手写控制器

**Step1:** 新建文件

在 Http/Controllers 下新建 TestController.php

**Step2:** 编写内容

```
namespace App\Http\Controllers;
class TestController extends \App\Http\Controllers\Controller 
{
    public function lst()
    {
        return "this is test controller@lst";
    }
}
```

**Step3:** 优化

```
namespace App\Http\Controllers;
// 引入空间类元素
use App\Http\Controllers\Controller;
class TestController extends Controller
{
    public function lst()
    {
        return "this is test controller@lst";
    }
}
```

### 3.2 artisan脚本自动生成

**Step1:** 进入artisan脚本目录

**Step2:** 执行脚本

```
$ php artisan make:controller Test/UserController
```

## 4. 视图

laravel使用blade模板引擎，视图文件存放在 resource/views 目录下，模板使用 .blade.php 命名









## 3. 中间件

**Step1:** 生成中间件TestMiddleware

```
$ php artisan make:middleware TestMiddleware
```

**Step2:** 编写中间件

```
public function handle($request, Closure $next)
{
	if(!session('uid')){
		// 重定向
		return redirect('/login');
	}
	return $next($request);
}
```

**Step3:** 注册中间件

```
protected $routeMiddleware = [
	...
	'login' => \App\Http\Middleware\TestMiddleware::class,
];
```

**Step4:** 编写路由

```
Route::get('/login', function () {
    session(['uid'=>100]);
    return 'login登录页面';
});
```

或

```
Route::get('/setting', function () {
    return 'setting路由...uid='.session('uid');
})->middleware('login');
```

**Step5:** 测试

## 4. 依赖注入

IOC容器，bind、make

## 5. http请求

```
Route::get('/user/add', 'Test\UserController@add');
```



Step1: 使用依赖注入Request对象



Step2: 使用Request的all()方法



