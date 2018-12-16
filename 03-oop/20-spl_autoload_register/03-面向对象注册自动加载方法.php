<?php

// 在面向对象的编程风格中，一般会将用户自定义的自动加载函数封装到一个类中，此时方法分静态方法和普通方法
class Common {
	// 静态方法
	public static function autoload($class_name) {
		if(file_exists('./' . $class_name . '.class.php')) {
			include './' . $class_name . '.class.php';
		}else {
			die("系统错误,没找到相关的类文件！");
		}
	}
	// 普通方法
	public function autoload($class_name) {
		if(file_exists('./' . $class_name . '.class.php')) {
			include './' . $class_name . '.class.php';
		}else {
			die("系统错误,没找到相关的类文件！");
		}
	}
}

// 【 静态方法 】
// spl_autoload_register(array('类名','方法名'));
// spl_autoload_register('类名::方法名');	// 简单形式
spl_autoload_register(array('Common','autoload'));
spl_autoload_register('Common::autoload');

// 【 普通方法 】
$obj = new Common;
// spl_autoload_register(array(对象变量,'方法名'));
spl_autoload_register(array($obj,'autoload'));


$stu = new student;
echo '<pre>';
var_dump($stu);
