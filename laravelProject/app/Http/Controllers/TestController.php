<?php
namespace App\Http\Controllers;
// 引入空间类元素
use App\Http\Controllers\Controller;
class TestController extends Controller
{
    public function lst()
    {
        // return "this is TestController@lst";
        // return view('lst');

        // 显示 /resource/views/User/lst.blade.php 下的视图，并传递参数
        // return view('User.lst', ["name"=>"csxiaoyao", "age"=>25]);

        $data = [
            ["name"=>"csxiaoyao", "age"=>25],
            ["name"=>"sunshine", "age"=>26],
            ["name"=>"sun", "age"=>27],
        ];
        return view('User.lst', ["name"=>"default", "data"=>$data]);
    }
}