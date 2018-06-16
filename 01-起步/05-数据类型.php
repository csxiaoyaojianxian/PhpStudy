<?php

// 【 PHP数据类型 】
// 标量(基本)数据类型：字符串型、整型、浮点型、布尔型
// 复合数据类型：数组、对象
// 特殊数据类型：资源、NULL

/**
 * 【 判断数据类型 】
 */
// var_dump()：打印变量的类型和值
// is_bool()：判断变量是否是布尔型
// is_int()：判断变量是否是整型
// is_float()：判断变是否是浮点型
// is_numeric()：判断变量是不是数值型
// is_array()：判断变量是否是数组
// is_string()：判断变量是否是字符串
// is_null()：判断变量是否为NULL
// is_resource()：判断变量否是资源型

// 【 1、整型 】
// 整型包括：正整数、负整数、零
// （1）整型的表示方法
// 十进制表示：$a = 90;
// 八进制表示：$a = 077;  //以0开头就是八进制
// 十六进制表示：$a = 0x89FA;  //以0x开头就是16进制
// （2）最大整数(PHP_INT_MAX)
// PHP中整数的范围：-2^31(-2147483648) ~ 2^31-1(2147483647) 
// 如果一个整数超出范围，则转成浮点数。如：PHP_INT_MAX+1

// 【 2、浮点型 】
// 浮点数的范围：1.8E-308 ~ 1.8E+308，E是以10为底
// 1.8E5：是一种科学计数方式。1.8*10^5 = 180000

// 【 3、字符串型 】
// 字符串定义的三种方式
// 1-单引号，输出的是变量的名称，不能解析变量
//     单引号内中的转义字符，只能是 \'、\\
// 2-双引号，输出的是变量的值，可以解析变量
//     双引号内的转义字符，基本都可以使用：\\、\"、\n、\$、\t、\r
//     如果一个变量后跟一个非空字符，会当成一个变量来处理
//     如果一个变量后跟英文下的标点符号，可以直接解析变量
$name = "csxiaoyao";
// echo "$name的基本信息";
echo "{$name}的基本信息";
echo "<font color=red>$name</font>的基本信息";
// 3-长字符串的表示：heredoc标识符
//     将一个长字符串，放在"<<<heredoc"和"heredoc;"之间；
//     "heredoc"这个名称可以自定义
//     必须以"<<<heredoc"开头，必须以"heredoc;"结尾
//     "heredoc;"必须单独一行、必须顶头排
//     长字符串中，可以放置HTML、CSS、JS、PHP的变量，但不能进行运算
//     Heredoc的功能与双引号的功能一样，都可以解析PHP变量
$title = "sunshine";
$str = <<<heredoc
<html>
<head>
	<meta charset="utf-8">
	<title>$title</title>
</head>
<body></body>
</html>
heredoc;
echo $str;

// 【 4、布尔型 】
// 布尔型只有两个值true、false
// 转成布尔型为FALSE的值：
// 0、""、"0"、false、NULL、array()、空对象，转成布尔型都认为是FALSE

// 【 5、NULL 】
// 空型，没有类型，如果一个变量不存在，则认为空型，空型只有一个值NULL
// 空型两种存在情况：
//     不存在的变量
//     unset() 某一个变量
$a = 100;
unset($a);
var_dump($a);

// 【 6、资源型 】
// 第三方插件为PHP的资源，如：MySQL、GD2、FileSystem等
// 资源是到第三方数据的一个引用，也称为"引用传值"
// 资源转成布尔型永远为TRUE
$link = mysql_connect('localhost','root','root');
var_dump($link);

// 【 7、数组 】 见详解
// 【 8、对象 】 见详解


/**
 * 【 类型转换 】
 */
// 1、强制转换
// (int)$a ，强制转成整型
// (string)$a ，强制转成字符串
// (object)$a ，强制转成对象
// (bool)$a ，强制转成布尔值
// (float)$a ，强制转成浮点型
// (array)$a ，强制转成数组型
$a = "100px";
$int_a = (int)$a;
$bool_a = (bool)$a;
$array_a = (array)$a;
var_dump($int_a, $bool_a, $array_a); // int(100)  bool(true)  array(1){[0]=>string(5)"100px"}

// 2、自动转换 -- 其它类型转成布尔型
$a = 100; // true
$a = 0; // false
$a = 0.98; // true
$a = ""; // false
$a = "120px"; // true
$a = "0"; // false
$a = "abc"; // true
$a = NULL; // false
$a = array(); // false
// 强制转换
$result = (bool)$a;
var_dump($result);

// 3、其它类型转成数值型
$a = "120px"; // 120
$a = "abc120"; // 0
$a = ""; // 0
$a = true; // 1
$a = false; // 0
$a = NULL; // 0
$a = 100.98; // 100
// 强制转换
$result = (int)$a;
var_dump($result);

// 4、其它类型转字符串
$a = 100; // "100"
$a = 0; // "0"
$a = -0.98; // "-0.98"
$a = true; // "1"
$a = false; // ""
$a = NULL; // ""
// 强制转换
$result = (string)$a;
var_dump($result);


