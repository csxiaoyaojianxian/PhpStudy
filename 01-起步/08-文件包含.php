<?php

/**
 * PHP服务器端包含
 * include、require
 */
// include、require都是语法结构，不是真正的函数，因此后面的括号可带可不带
// 两个都是包含文件，但在处理错误时方式不一样
//   include：将另一个文件的代码包到当前文件中执行，若包含文件不存在，报一个警告错误(E_WARNING)，脚本会继续向下执行
//   require：将另一个文件的代码包到当前文件中执行。若包含文件不存在，报一个致命错误(E_ERROR)，脚本会终止执行
include "1.php";
include("1.php");

/**
 * include_once & include
 * require_once & require
 */
// include_once：将另一个文件的代码包到当前文件中执行。对包含的文件会进行判断，如果该文件曾经被包含过，则该文件就不会再包含了
// require_once：将另一个文件的代码包到当前文件中执行。对包含的文件会进行判断，如果该文件曾经被包含过，则该文件就不会再包含了
// 提示：在一个脚本文件中，不能定义两个同名的函数(函数重载)
// 使用include_once可以避免函数重载
require_once "1.php";

/**
 * 包含文件中的return语句
 */
// 包含文件中的return语句，可以向include返回一个值，然后再把该值存储一个变量
# 1.php
return array(1,2,3,4,5);
echo "sunshine";
# main.php
$arr = include_once "1.php";
var_dump($arr);

