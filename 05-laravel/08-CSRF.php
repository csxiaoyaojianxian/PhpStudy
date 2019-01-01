<?php
// Csrf_token 输出token值
// Csrf_field 输出input隐藏域

// 并不是所有请求都需要避免CSRF攻击，比如第三方API获取数据的请求
// 可以通过在VerifyCsrfToken（app/Http/Middleware/VerifyCsrfToken.php）中间件中将要排除的请求URL添加到$except属性数组中

/*
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>表单提交</title>
</head>
<body>
    <form action="{{route('testModel')}}" method="post">
    	姓名：<input type="text" name="name" value=""/>
    	年龄：<input type="text" name="age" value=""/>
    	邮箱：<input type="text" name="email" value=""/>
    	{{csrf_field()}}
    	<input type="submit" value="提交"/>
    </form>
</body>
</html>


{{csrf_field()}}   =>    <input type="hidden" name="_token" value="uZuegPc28mZR54ZgEplm170oeDQtO07e1xxUyiHm">