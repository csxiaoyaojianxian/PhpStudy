<?php

namespace App\Http\Controllers;
//引入session
use Session;

class TestController extends Controller
{
    //会话控制
    public function test () {
        // Session中存储一个变量
        Session::put('name','csxiaoyao');
        // Session中获取一个变量
        echo Session::get('name');
        // Session中获取一个变量或返回一个默认值（如果变量不存在）
        dd(Session::get('gender','保密'));
        dd(Session::get('gender',function(){return '保密';}));
        // Session中获取所有变量
        dd(Session::all());
        // 检查一个变量是否在Session中存在
        dd(Session::has('name'));
        // Session中删除一个变量
        Session::forget('name');
        // Session中删除所有变量
        Session::flush();
    }
}

// 补充：session方法也可以在视图中使用，如：{{ Session::get('code')}}
