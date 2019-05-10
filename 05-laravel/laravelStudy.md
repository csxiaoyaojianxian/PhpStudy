# laravel入门

## 1. 使用composer安装

安装composer

```
// 局部安装
$ php composer.phar --version
// 全局生效，需把composer.phar移到/usr/local/bin/目录下
// 使用composer代替每次输入php composer.phar
$ mv composer.phar /usr/local/bin/composer
$ composer -V
// 或者使用brew安装
$ brew install composer
```

安装创建项目

```
$ composer -v create-project laravel/laravel laravelProject
```

## 2. 路由

laravel框架是重路由框架，需要在 `routes/web.php` 中编写路由规则

```
/**
 * http请求: [get/post/put/delete/...]
 * @param [string] url路由地址
 * @param [closure] php处理程序 
 */
// 1. 基本路由
Route::get('/test', function(){
    echo '基本路由...';
});

// 2. 带必选参数的路由，param1=>$id，param2=>$content
Route::get('/testp/{param1}/content/{param2}', function($id,$content){
    echo "带必选参数的路由,id:{$id},content:{$content}...";
});

// 3. 带可选参数的路由，param1=>$id
Route::get('/testop/{param1?}', function($id=0){
    echo "带可选参数的路由,id:{$id}...";
});

// 4. 单参数的正则约束
Route::get('/testrule/{param1}', function($id){
    echo "单参数的正则约束...";
})->where('param1','\d+');

// 5. 多参数的正则约束
Route::get('/testrules/{name}/{age}', function($n,$a){
    echo "多参数的正则约束...name:$n,age:$a";
})->where(['name'=>'\w+', 'age'=>'\d+']);

// 6. 路由到控制器方法
Route::post('/test/fn', 'TestController@lst');
Route::match(['get','post'],'/',function(){ // ... });
Route::any('foo',function(){ // ... });

// 7. 路由分组
// Route::group
```

## 3. 控制器

### 3.1 手写控制器

**Step1:** 新建文件

在 `Http/Controllers` 下新建 `TestController.php`

**Step2:** 编写内容

```
namespace App\Http\Controllers;
class TestController extends \App\Http\Controllers\Controller 
{
    public function lst()
    {
        return "this is TestController@lst";
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
        return "this is TestController@lst";
    }
}
```

### 3.2 artisan脚本自动生成

**Step1:** 进入artisan脚本目录(项目根目录)

**Step2:** 执行脚本

```
$ php artisan make:controller Test/UserController
```

## 4. 视图

laravel使用blade模板引擎，视图文件存放在 `/resource/views` 目录下，模板使用 `.blade.php` 命名

### 4.1 加载视图

使用全局辅助函数 `view()` 加载视图

创建带目录的视图，创建`/resource/views/lst.blade.php`和`/resource/views/User/lst.blade.php`

```
public function lst()
{
	// return view('lst');
	return view('User.lst');
}
```

### 4.2 视图传参

通过 `view()` 的第二个参数传参

```
public function lst()
{
	// 显示 /resource/views/User/lst.blade.php 下的视图，并传递参数
	return view('User.lst', ["name"=>"csxiaoyao", "age"=>25]);
}
```

通过插值表达式在 `lst.blade.php` 模板中取值

```
插值表达式 {{ $name }} : {{ $age }}
```

### 4.3 blade模板语法

变量访问，lst.blade.php

```
使用php原生语法访问变量
<?php echo $name; ?>

使用插值表达式，模板标签
{{ $name }} : {{ $age }}

使用php函数
<?php echo time(); ?>
{{ time() }}
```

循环，lst.blade.php

```
public function lst()
{
	$data = [
		["name"=>"csxiaoyao", "age"=>25],
		["name"=>"sunshine", "age"=>26],
		["name"=>"sun", "age"=>27],
	];
	return view('User.lst', ["name"=>"default", "data"=>$data]);
}
```

循环，lst.blade.php

```
@foreach($data as $v)
    {{ $v['name'] }} : {{ $v['age'] }} <br />
@endforeach

<?php foreach($data as $key => $value): ?>
    <?php echo $value['name']; ?> : <?php echo $value['age']; ?> <br />
<?php endforeach ?>
```

## 5. 中间件

中间件为进入的 HTTP 请求进行过滤，例如验证登录等

**Step1:** 生成中间件TestMiddleware

laravel的中间件存放在 `Http/Middleware` 下

```
$ php artisan make:middleware TestMiddleware
```

**Step2:** 编写中间件

```
public function handle($request, Closure $next)
{
	if(!session('uid')){
		return redirect('/login'); // 重定向
	}
	return $next($request);
}
```

**Step3:** 注册中间件

在 `Http/kernel.php` 中注册 `login` 中间件

```
protected $routeMiddleware = [
	...
	'login' => \App\Http\Middleware\TestMiddleware::class,
];
```

**Step4:** 编写路由

调用中间件

```
Route::get('/setting', function () {
    return 'setting路由...uid='.session('uid');
})->middleware('login');
```

编写未登录的重定向路由

```
Route::get('/login', function () {
    session(['uid'=>100]);
    return 'login登录页面';
});
```

## 6. 依赖注入

IOC容器，bind、make

## 7. http请求

**Step1:** 编写路由到控制器

```
Route::get('/user/add', 'Test\UserController@add');
Route::post('/user/add', 'Test\UserController@add');
```

合并写法

```
Route::match(['get','post'],'/user/add','Test\UserController@add');
```

**Step2:** 使用依赖注入Request对象

`dd` 为调试命令，相当于 `var_dump+die`

```
public function add(Request $request)
{
	dd($request); // 调试命令 dd => var_dump+die
}
```

**Step3:** 使用 Request 的 `all()` / `input()` 方法获取输入值

http请求地址：`http://local.laravel.com/public/user/add?name=sunshine&age=25`

```
// all() 方法，获取所有的输入值
dd($request->all());

// input()方法，获取单个输入值，第二个参数为默认值
dd($request->input("name"));
dd($request->input("username", "csxiaoyao"));
```

**Step4:** 使用Request的 `method` 方法区分请求

```
// isMethod()方法
if($request->isMethod('GET')){
	return view('lst'); // 显示视图
}else if($request->isMethod('POST')){
	dd($request->all()); // 数据处理
}
```

编写视图 `/resources/views/lst.blade.php`，注意：框架为了防范CSRF攻击，使用了token，需要在表单中使用 `{{ csrf_field() }}` 设置名为 `_token` 的cookie

```
<form action="/user/add" method="post">
	{{ csrf_field() }}
	用户名：<input type="text" name="name">
	<input type="submit" name="btn" value="提交">
</form>
```



