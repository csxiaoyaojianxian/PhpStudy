<?php

namespace App\Http\Controllers\Test;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function lst()
    {
        return "this is user controller@lst";
    }

    public function add(Request $request)
    {
        // 调试命令 dd  var_dump+die
        // dd($request);

        // all()方法，获取所有的输入值
        // dd($request->all());

        // input()方法，获取单个输入值，第二个参数为默认值
        // dd($request->input("name"));
        // dd($request->input("username", "csxiaoyao"));

        // isMethod()方法
        if($request->isMethod('GET')){
            // 显示视图
            // return "这里是get请求";
            return view('lst');
        }else if($request->isMethod('POST')){
            // 数据处理
            dd($request->all());
        }
    }
}
