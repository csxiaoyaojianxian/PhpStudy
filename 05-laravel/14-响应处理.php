<?php

/**
 * 响应
 * 常规响应：
 *   展示视图：return view('welcome');
 *   直接返回字符串：return 'hello world';
 * ajax响应：
 *   json、xml、text/html
 */
namespace App\Http\Controllers;
use App\Home\Member;
class TestController extends Controller
{
    //ajax的响应
    public function testAjax () {
        //查询数据
        $data = Member::all();
        //json格式响应
        //return json_encode($data);
        return response() -> json($data);
        // if($data){
        //     return redirect('/');
        //     return redirect() -> to('/');
        // }
    }
}

// 注意：在laravel中布尔值是不能被直接通过 return 响应输出的
