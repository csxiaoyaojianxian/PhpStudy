<meta http-equiv="content-type" content="text/html;charset=utf-8">
<?php


$name = "csxiaoyao"; //全局变量
function showInfo()
{
	global $name; //声明为全局变量，实质是引用传地址
	$name = "Mary";
	echo "我的名字叫{$name}<hr>";
}
showInfo();
echo "它的名字叫{$name}。<hr>";
//************************************
function showInfo2()
{
	//以下$name变量不存在。
	echo "你的名字叫{$name}<hr>";
}
showInfo2();
?>
