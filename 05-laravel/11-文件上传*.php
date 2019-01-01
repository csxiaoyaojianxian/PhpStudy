<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Input;
use App\Home\Member;

class TestController extends Controller
{
    //文件上传操作
    public function testUpload (Request $request) {
        //判断请求类型
        if(Input::method() == 'POST'){
            //上传
            //判断文件是否正常
            if($request -> hasFile('avatar') && $request -> file('avatar') -> isValid()){
                // 获取文件的原始名称
                // dd($request -> file('avatar') -> getClientOriginalName());
                // 获取文件的大小
                // dd($request -> file('avatar') -> getClientSize());
                // 获取错误信息
                // dd($request -> file(‘avatar’) -> getErrorMessage());
                $path = md5(time() . rand(100000,999999)) . '.' . $request -> file('avatar') -> getClientOriginalExtension();
                $request -> file('avatar') -> move('./uploads',$path);
                // 获取全部的数据
                $data = $request -> all();
                // 将路径添加到数组中
                $data['avatar'] = './uploads/' . $path;
                $result = Member::create($data);
                // 判断是否成功
                if($result){
                    return redirect('/');
                }
            }
        }else{
            //展示视图
            return view('home.test.test');
        }
    }
}
