<?php

/**
 * 【 函数参数传递 】
 */
// 1、值传递(拷贝传值)

// 2、引用传递(引用传地址)
// 默认情况下，对象和资源是引用传递
// 使用"&"，可以将其它变量变成"引用传递"
function show(&$name, &$age){
	$name = "sunshine";
}
$a = "csxiaoyao";
$b = 25;
show($a,$b);
echo $a; // sunshine

// 3、默认参数
// 如果实参个数少于形参时，将用默认参数来代替实参
// 提示：默认参数只能放在非默认参数的右边
// 提示：默认参数的值，几乎所有类型都可以，但不能是函数调用、资源、对象
function show($name, $age=18, $action=NULL){
	echo $name,$age,$action;
}
$a = "csxiaoyao";
$b = 25;
show($a); // csxiaoyao18
show($a,$b); // csxiaoyao25
show($a,$b,"sleep"); // csxiaoyao25sleep

/**
 * 【 可变数量参数 】
 */
// 如：var_dump($a,$b,$c,...)、unset($a,$b,$c,...)
// 提示：以下三个函数只能在函数内部来使用。
// func_get_args()：获取传递过来的参数，并以数组方式返回
function getSum(){
	$arr = func_get_args();
	$sum = 0;
	for($i = 0; $i < count($arr); $i++){
		$sum += $arr[$i];
	}
	echo $sum;
}
getSum(1,2,3,4,5,6,7,8,9);
// func_get_arg($index)：获取指定下标的参数
function getSum(){
	$arr = func_get_args();
	$sum = 0;
	for($i = 0; $i < count($arr); $i++){
		$sum += func_get_arg($i);
	}
	echo $sum;
}
getSum(1,2,3,4,5,6,7,8,9);
// func_num_args()：获取参数的总个数
function getSum(){
	$len = func_num_args();
	$sum = 0;
	for($i = 0; $i < $len; $i++){
		$sum += func_get_arg($i);
	}
	echo $sum;
}
getSum(1,2,3,4,5,6,7,8,9);

/**
 * 【 可变函数 】
 */
// 函数名是一个变量，而该变量又是一个字符串的函数名
// 可变函数可以实现动态调用函数
$a = "getSum";
$a(1,2,3,4,5,6,7,8,9);

/**
 * 匿名函数
 */
// 没有名字的函数，两种用法
// 1、用来作为数据，传给其它变量
$f = function(){
	echo 'ok';
}; // 此处分号不能省略
$f();
// 2、作为函数的实参，传递给形参
function getSum($a, $b){
	echo $a + $b();
}
getSum(10,function(){
	return 20;
});

/**
 * 【 函数递归调用 】
 */
// 斐波那契数列
function f($num){
	// 退出条件
	if($num == 1 || $num == 2){
		return 1;
	}else{
		return f($num-1) + f($num-2);
	}
}
echo f(5); // 5

