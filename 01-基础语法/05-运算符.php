<meta http-equiv="content-type" content="text/html;charset=utf-8">
<?php


$a = 10;
$b = $a++; // 先赋值再加1。先将变量$a的值，赋值变量$b，然后，再将$a+1
var_dump($a,$b);
//***********************
$a = 10;
$b = ++$a; // 先加1再赋值。先将$a+1，再将结果赋给变量$b
var_dump($a,$b);

$c = ++$a+10;
//$c = $a+++10;
var_dump($a,$c);


//实例：将一个<img>的宽度(400px)，变成原来的2倍。
//(1)定义变量
$width = "400px";
//(2)运算过程
$width *= 2; //展开后 $width = $width * 2
             //       $width = "400px" * 2 = 400*2 = 800
$width .= "px"; // 展开后 $width = 800."px"="800px"
//(3)输出结果
echo "图片现原宽度为：$width";


//实例：年龄是否符合当兵的年龄
//(1)获取地址栏中用户输入的年龄
$age = $_GET["age"];
//(2)判断是否符合当兵年龄
if($age>18 && $age<25)
{
	echo "恭喜，你可以来当兵了。";
}else
{
	echo "对不起，该干嘛干嘛去。";
}


//求两个整数的最大值
//（1）使用if条件判断制作
$a = 10;
$b = 20;
if($a > $b)
{
	$max = $a;
}else
{
	$max = $b;
}
echo "最大值为：$max";
echo "<hr>";
//（2）使用三元运算符制作
$max = $a > $b ? $a : $b;
echo "最大值为：$max";
echo "<hr>";

//判断婚否状态
$isMarried = true;
echo $isMarried ? "已婚" : "未婚";
?>
