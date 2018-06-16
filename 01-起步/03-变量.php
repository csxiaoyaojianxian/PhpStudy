<?php

/**
 * 变量作用域
 */
// * 1、JS
// 全局变量：在函数外定义的变量，可以直接在函数内使用，网页执行完毕销毁
// 局部变量：在函数内定义的变量，函数执行完毕销毁
// * 2、PHP
// 超全局变量：在函数内或函数外使用，网页执行完毕销毁。如：$_GET、$_POST
// 全局变量：即在函数外定义的变量，在函数内不能使用，网页执行完毕销毁
// 局部变量：即在函数内定义的变量，函数执行完毕销毁
// * 3、在局部作用域中访问全局变量——global关键字
// 在函数内引用全局变量
// global只能在函数内部使用
// global只能引用全局变量，而不能一边引用一边赋值
// * 4、$GLOBALS超全局变量数组
// $GLOBALS是一个超全局变量数组
// $GLOBALS该数组中包含：$_GET、$_POST、$_COOKIE、$_FILES
$name = "csxiaoyao";
function show(){
	// 引用函数外全局变量并修改
	global $name;
	$name = "sunshine";
	echo $name;
	// 使用$GLOBALS超全局变量数组
	$GLOBALS['hobby'] = "sleep";
	echo $GLOBALS['hobby'];
}
show();
echo $name; // sunshine
print_r($GLOBALS);
unset($GLOBALS['hobby']);
print_r($GLOBALS);

/*
PHP变量名前要加”$”符号，只是一个PHP变量的标识符，它不是变量名的一部分。如：$name
PHP中的关键字也可以作为变量名称。如：$break、$true、$for
*/

// 构建输出结果
$name = 'csxiaoyao';
$str = "姓名是：{$name}";
echo $str;

// 【 isset() 判断变量是否存在 】
// bool isset ( mixed $var [, mixed $... ] )
// 如果 var 存在并且值不是 NULL 则返回 TRUE，否则返回 FALSE
if(isset($name)){
	echo "变量存在";
}else{
	echo "变量不存在";
}

// 【 empty() 判断变量是否为空 】
// bool empty ( mixed $var )
// 如果 var 是非空或非零的值，则 empty() 返回 FALSE。换句话说，""、0、"0"、NULL、FALSE、array()、以及没有任何属性的对象都将被认为是空的，如果 var 为空，则返回 TRUE

// 【 unset() 删除变量 】
// 释放给定的变量、释放空间
// void unset ( mixed $var [, mixed $... ] )
// 静态变量不能用unset()，需要赋值null
static $a = 1;
$a = null;

// 【 打印 】
// var_dump() 显示变量的类型和值
// void var_dump ( mixed $expression [, mixed $... ] )

// print_r() 显示变量的易于理解的信息
// bool print_r ( mixed $expression )
// 如果给出的是 string、integer或 float，将打印变量值本身。如果给出的是 array，将会按照一定格式显示键和元素。object与数组类似。

// 【 可变变量 】
// 可变变量：一个变量的名称，用另一个变量的值来充当
$abc = 'csxiaoyao';
$hello = 'abc';
echo $$hello;  // $$hello >> $abc >> csxiaoyao 

// 【 值传递 & 引用传递 】
// 1、变量的值传递(拷贝传值)
// PHP中 字符串型、整型、浮点型、NULL、数组
// [基本数据类型] 将变量的名和变量的值，都存在”栈内存”中
// 2、引用传地址(引用传值)
// PHP中 对象、资源 默认是引用传地址，将变量名和数据地址存"栈内存"中，将真正的数据存"堆内存"中
// !!! 注意点1: JS数组默认引用传递
// !!! 注意点2: PHP基本数据类型也可以实现"引用传递"，在要引用的变量名前加"&"，告诉变量引用地址，而不是数据
$a = 100;
$b = &$a;
$a = 500;
echo "\$a=$a,\$b=$b";

// 【 超全局变量(预定义变量)数组 】 8个
// 名称是固定的，必须全大写，下划线开头
// $_GET、$_POST
// $_REQUEST 包含GET和POST方式的全部数据
// $GLOBALS 全局中的全局(包含大部分的超全局数组信息)
// $_SERVER 存储每一次的http请求的信息(见手册)
// $_SESSION、$_COOKIE、$_FILES
 