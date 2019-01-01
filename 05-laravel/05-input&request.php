<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

// 接收用户输入的类：Illuminate\Support\Facades\Input
// 既可以获取get中信息，也可以获取post中信息
// Facades：门面，介于类的实例化与未实例化的中间状态，其实是类的接口实现，可以调用类中的方法但不实例化类，即静态方法
// Use Illuminate\Support\Facades\Input  // 可以在config/app.php中定义长串的别名（在aliases数组中定义别名）
// 'aliases' => [
//     'Input' => Illuminate\Support\Facades\Input::class,
// ]
use Input;

// 【 dd() 】
// 在laravel中友好输出函数：dd()
// 作用：dump+die，后续的代码不会执行

class TestController extends Controller
{
    // 测试Input获取数据
    public function test () {
        // Input::get('paramName', 'paramDefault')
    	echo Input::get('id','0') . '<br/>';
    	// Input::all() 获取所有输入（数组形式返回）
    	$all = Input::all();
        dd($all);
    	// 获取指定的信息（字符串形式）
    	dd(Input::get('name'));
    	// 获取指定的几个值（数组形式）
    	dd(Input::only(['id','name']));
    	// 获取除了指定的值，之外的值
    	dd(Input::except(['name']));
    	// 判断某个值存在与否（布尔值）
		dd(Input::has('gender'));
		echo Input::method(); // GET POST
	}
	
	// 在laravel中不仅Input门面可以获取用户输入
	// Request门面也可以获取用户输入
	// 语法和Input一样，也存在get、all、only等方法
	// 测试request获取数据
	public function test2 (Request $request) {
		dd($request->all());
		dd($request->input('name'));
		dd($request->only(['name','age']));
		dd($request->except(['name','age']));
		dd($request->has('name'));
		dd($request->get('name'));
	}
}
