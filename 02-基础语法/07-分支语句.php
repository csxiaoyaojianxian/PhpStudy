<meta http-equiv="content-type" content="text/html;charset=utf-8">
<?php

//实例：判断用户输入的年份，是不是闰年
/*
	(1)能被4整除，且不能被100整除
	(2)能被400整除。
	(3)条件(1)和(2)的关系是或的关系
*/
$year = $_GET["year"];
if($year%4==0 && $year%100!=0 || $year%400==0)
{
	echo "{$year}是闰年";
}else
{
	echo "{$year}是平年";
}
//实例：根据用户输入的分数，给其下不同的评语
//（1）获取地址栏中，用户输入的分数
$score = (int)$_GET["score"];
//（2）多条件判断
if($score>=90)
{
	$str = "优秀";
}else if($score>=80)
{
	$str = "良好";
}else if($score>=70)
{
	$str = "中等";
}else if($score>=60)
{
	$str = "及格";
}else
{
	$str = "不及格";
}
echo $str;

//实例：根据用户状态值，输出用户当前的信息
/*
	0，登录失败
	1，登录成功
	2，VIP用户
	3，VIP缴费到期
*/
$status = 2;
switch($status)
{
	case 1:
		$str = "登录成功！";
		break;
	case 2:
		$str = "VIP用户！";
		break;
	case 3:
		$str = "VIP缴费到期";
		break;
	default:
		$str = "登录失败！";
}
echo $str;
?>
