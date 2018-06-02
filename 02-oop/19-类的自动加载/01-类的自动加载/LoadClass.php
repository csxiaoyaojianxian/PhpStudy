<?php
header('content-type:text/html;charset=utf-8');
/*
require 'Goods.class.php';
require 'Books.class.php';
require 'Phone.class.php';
*/

// 在项目中
// 1. 一个文件中存放一个类
// 2. 文件名与类名同名
// 3. 以.class.php结尾
// 当页面执行的时候，通过PHP核心程序（Zend Engine）判断用户脚本需要哪个类。如果没有找到，会自动的调用__autoload()函数，
// 并且会将缺少的类名传递给__autoload()函数，只需要在__autoload函数中加载缺少的类即可

$book=new Books();
$phone=new Phone();
$book->setName('PHP入门与精通');
$phone->setName('诺基亚2100');
$book->getName();
$phone->getName();
//自动加载类
function __autoload($class_name) {
	require "./{$class_name}.class.php";
}