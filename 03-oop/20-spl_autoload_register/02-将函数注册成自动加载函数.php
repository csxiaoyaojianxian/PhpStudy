<?php

// 注册一个可以加载类文件的普通函数
function f1($class_name) {
	if(file_exists('./' . $class_name . '.class.php')) {
		include './' . $class_name . '.class.php';
	}else {
		die("系统错误,没找到相关的类文件！");
	}
}

function f2($class_name) {
	echo "in f2";
	var_dump($class_name);
}

function f3($class_name) {
	echo "in f3";
	var_dump($class_name);
}

function __autoload($class_name) {
	if(file_exists('./' . $class_name . '.class.php')) {
		include './' . $class_name . '.class.php';
	}else {
		die("系统错误,没找到相关的类文件！");
	}
}

/**
 * 可以注册多个自动加载函数
 * 在需要的类文件载入成功之前，会依次按注册的顺序执行，直到找到为止
 * 一旦注册其他的自动加载函数，那么系统默认的__autoload函数失效
 * 如果想继续使用__autoload函数，必须像注册其他的普通函数一样重新注册
 */
// 将f3函数注册成自动加载函数
spl_autoload_register('f3');
// 将f1函数注册成自动加载函数
spl_autoload_register('f1');
// 将f2函数注册成自动加载函数
spl_autoload_register('f2');
// 将__autoload函数注册成自动加载函数
spl_autoload_register('__autoload');

// 实例化一个对象
$stu = new Student;
echo '<pre>';
var_dump($stu);
