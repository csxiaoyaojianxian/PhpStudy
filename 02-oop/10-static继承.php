<?php
/**
 * @Author: sunshine
 * @Date:   2018-06-01 11:32:35
 * @Last Modified by:   sunshine
 * @Last Modified time: 2018-06-02 09:21:27
 */

ini_set('display_errors','On');
header('content-type:text/html;charset=utf-8');

class Person {
	public static $national='中国';	//静态属性
	public static function show() { //静态方法
		echo '父类静态方法<br>';
	}
}
class Student extends Person {
	
}
// 静态成员可以继承
echo Student::$national,'<br>';
Student::show();
