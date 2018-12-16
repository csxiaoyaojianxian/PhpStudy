<?php

// 实例化一个学生类
$stu = new Student; // 此时php会自动的调用__autoload

function __autoload($class_name) {
	// var_dump($class_name);
	if(file_exists('./' . $class_name . '.class.php')) {
		// 通过类名加载相关的类文件
		include './' . $class_name . '.class.php';
	}else {
		die("系统错误,没找到相关的类文件！");
	}
}

var_dump($stu);

// 一般的，系统的自动加载函数就是__autoload()
// 但是，随着项目的扩展，有可能出现多个自动加载函数
// 比如，被加载的文件里面又出现了自动加载函数，这个时候就出现了函数的重名的问题
// 不使用__autoload函数，而是注册用户自己的自动加载函数以避免上述情况的发生