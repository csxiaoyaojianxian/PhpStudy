<meta http-equiv="content-type" content="text/html;charset=utf-8">
<?php

//实例：其它类型转成布尔型
//总结：这些数值将转成false
// 0、0.0、""、"0"、array()、null
//资源类型永远为TRUE。
$a = 100;        // true
$a = 0;          // false
$a = 0.98;       // true
$a = "";		 // false
$a = "10px";     // true
$a = "120";      // true
$a = NULL;       // false
//使用运算符(bool)强制转换
$result = (bool)$a;
//打印变量的类型和值
var_dump($result);


//实例：其它类型转成整型
/*
总结：
(1)如果以数值开头的字符串，可以转成整型，并去掉后面字符
(2)如果开头不含数值的字符串，将转成0。
*/
$a = "";		 // 0
$a = "10px";     // 10
$a = "120";      // 120
$a = "abc";      // 0
$a = 10.98;      // 10
$a = NULL;       // 0
$a = true;       // 1
$a = false;      // 0
//使用运算符(int)强制转换
$result = (int)$a;
//打印变量的类型和值
var_dump($result);


//实例：其它类型转成字符型
/*
总结：
(1)NULL和false转成空字符串
(2)整数0，转成"0"
*/
$a = 100;        // "100"
$a = 0;          // "0"
$a = 10.98;      // "10.98"
$a = NULL;       // ""
$a = true;       // "1"
$a = false;      // ""
//使用运算符(string)强制转换
$result = (string)$a;
//打印变量的类型和值
var_dump($result);
?>
