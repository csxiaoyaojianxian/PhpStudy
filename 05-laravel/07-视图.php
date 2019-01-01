<?php
// resources/views
// laravel视图使用blade模板引擎，后缀是 .blade.php
// 也可以使用.php结尾，但不能使用laravel提供的标签{{ $title }}语法显示数据，只能使用原生语法 <?php echo $title; 显示数据
// 两个视图文件同时存在，则.blade.php后缀的优先显示

// 控制器 Return view('视图文件名称');
// 视图支持分目录管理，/resources/views/home/test/testView.blade.php
// Return view('home/test/testView')
// Return view('home.test.testView')

namespace App\Http\Controllers;
class TestController extends Controller
{
    public function testView () {
    	// 变量分配与展示
        $date = date('Y-m-d H:i:s',time());
        $time = strtotime('+1 year');
        // return view('home.test.testView')->with(['date' => $date,'time' => $time]);
        // return view('home.test.testView')->with('date',$date)->with('time',$time);
        // return view('home.test.testView',['date' => $date,'time' => $time]);
        return view('home.test.testView',compact('date','time')); // php的compact方法可以打包数组
        /*
            /resources/views/home/test/testView.blade.php
            现在是：{{$date}} 一年之后的时间是：{{date('Y-m-d H:i:s',$time)}}
        */
    }
}

/*
@foreach($data as $val)
	{{$val -> id}}&emsp;&emsp;{{$val -> name}}&emsp;&emsp;{{$val -> age}}&emsp;&emsp;{{$val -> email}}<br/>
@endforeach
<hr/>
今天是星期
@if($day == '1')
    一
@elseif($day =='2')
    二
@elseif($day =='3')
    三
@elseif($day =='4')
    四
@elseif($day =='5')
    五
@elseif($day =='6')
    六
@else
    天
@endif
*/

// 模板继承
/*
parent.blade.php
<h1>我是头部</h1>
<!-- 可变区域 -->
@yield('mainbody')
<!-- 可变区域 -->
<h1>我是尾部</h1>
@yield('mainbody2')
*/
/*
child.blade.php
<!-- 通过路径来引入 -->
<link rel="stylesheet" type="text/css" href="/css/app.css">
<!-- 系统的asset方法引入 -->
<link rel="stylesheet" type="text/css" href="{{asset('css')}}/app.css">
@extends('home.test.parent')
<!-- 指定yield标签的名字，绑定区块 -->
@section('mainbody2')
<div>
	sunshine
</div>
@endsection
<!-- 文件的包含 -->
@include('home.test.parent')
*/