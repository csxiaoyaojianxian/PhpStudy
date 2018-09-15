<meta http-equiv="content-type" content="text/html;charset=utf-8">
<?php
//判断表单是否提交
if(isset($_POST["ac"]) && $_POST["ac"]=="login")
{
	//获取表单元素的值
	$username = $_POST["username"];
	$userpwd = $_POST["userpwd"];
	echo "用户名：{$username}，密码：{$userpwd}";
}
?>
<hr>
<form name="form1" method="post" action="">
用户名：<input type="text" name="username">
密码：<input type="password" name="userpwd">
<!--隐藏域：主要用于向服务器端传值-->
<input type="hidden" name="ac" value="login">
<input type="submit" value="提交表单">
</form>

<?php

/*
检查一个变量是否为空
语法：bool empty ( mixed $var )
说明：换句话说，""、0、"0"、NULL、FALSE、array()、var $var;以及没有任何属性的对象都将被认为是空的，如果 var 为空，则返回 TRUE
 */
$name = "Mary";
$school;
if(empty($school)){
	echo "{$name}的毕业院校：未填写";
}else{
	echo "{$name}的毕业院校：$school";
}

?>