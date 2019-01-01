<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Input;
class TestController extends Controller
{
    // 自动验证
    public function testValidate (Request $request) {
        // 判断请求类型
        if(Input::method() == 'POST'){
            // 自动验证
            // required: 不能为空
            // max: 255 最长255个字符
            // min: 1 最少1个字符
            // email: 验证邮箱是否合法
            // confirmed: 验证两个字段是否相同，如果验证的字段是password,则必须输入一个与之匹配的password_confirmation字段
            // integer: 验证字段必须是整型
            // ip: 验证字段必须是IP地址
            // numeric: 验证字段必须是数值
            // max: value 验证字段必须小于等于最大值，和字符串，数值，文件字段的size规则一起使用
            // min: value 验证字段的最小值，对字符串、数值、文件字段而言，和size规则使用方式一致
            // size: value 验证字段必须有和给定值value想匹配的尺寸，对字符串而言，value是相应的字符数目，对数值而言，value是给定整型值；对文件而言，value是相应的文件字节数
            // string: 验证字段必须是字符串
            // unique: 表名，字段，需要排除的ID
            $this -> validate($request,[
                // 具体的规则
                // 字段 => 验证规则1|验证规则2|...
                'name'  =>  'required|min:2|max:20',
                'age'   =>  'required|integer|min:1|max:100',
                'email' =>  'required|email'
            ]);
        }else{
            return view('home.test.testView'); 
        }
    }
}

/*

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>表单</title>
</head>
<body>
	@if (count($errors) > 0)
	    <div class="alert alert-danger">
	        <ul>
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
	@endif

    <form action="" method="post">
    	<p>姓名：<input type="text" name="name" value=""></p>
    	<p>年龄：<input type="text" name="age" value=""></p>
    	<p>邮箱：<input type="email" name="email" value=""></p>
    	{{csrf_field()}}
    	<input type="submit" value="提交">
    </form>
</body>
</html>

*/

/**
 * 安装语言包
 */
// $ composer require caouecs/laravel-lang:~3.0
// 语言包文件在vendor/caoue/laravel-lang中，将需要的语言目录复制到resources/lang目录下
// 在文件（config/app.php）中修改locale的值，'locale' => 'zh-CN'
// 修改 resources/lang/zh-CN/zh-CN/validation.php，使中文更加准确
