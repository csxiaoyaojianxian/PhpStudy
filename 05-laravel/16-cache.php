<?php

namespace App\Http\Controllers;
//引入cache
use Cache;
class TestController extends Controller
{
    //缓存操作
    public function test () {
        // 设置一个缓存，如果存在同名则覆盖，时间单位为min
        Cache::put('key', 'value', 10);
        // 设置一个缓存，但是存在同名不添加，返回布尔值
        Cache::add('name', 'csxiaoyao', 10);
        // 永久存储
        Cache::forever('username','sunshine');

        // 获取指定的值
        echo Cache::get('username'); // 如果缓存项不存在，返回 null
        // 获取指定的值，如果不存在，则使用默认值替换
        echo Cache::get('sign','default');
        // 通过回调函数的方式来返回默认值
        echo Cache::get('time', function () {
            return date('Y-m-d H:i:s',time());
        });

        // 判断某个值是否存在
        var_dump(Cache::has('time'));

        // 使用pull方法实现一次性存储，从缓存中获取缓存项然后删除，如果缓存项不存在的话返回null
        var_dump(Cache::pull('username'));
        // 直接删除某一个值
        Cache::forget('username');
        // 删除全部的缓存文件，并且删除对应的目录
        Cache::flush();

        // 递增或者递减的实现
        Cache::increment('count');
        Cache::increment('count',10);
        Cache::decrement('count');
        Cache::decrement('count',10);

        // 设置默认的时间，如果请求的缓存项不存在时存储默认值
        $time = Cache::remember('time',100,function(){
            return date('Y-m-d H:i:s',time());
        });
        // 永久存储默认值
        $date = Cache::rememberForever('date',function(){
            return date('Y-m-d',time());
        });
        dd($date);
    }
}
