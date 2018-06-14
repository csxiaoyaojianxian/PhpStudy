<?php
/**
 * @Author: sunshine
 * @Date:   2018-06-01 11:32:35
 * @Last Modified by:   sunshine
 * @Last Modified time: 2018-06-01 23:57:04
 */

ini_set('display_errors','On');
header('content-type:text/html;charset=utf-8');
/*
1、	如果子类没有构造函数，就调用父类的构造函数
2、	如果子类有构造函数就调用自己的构造函数
3、	通过parent来调用父类的构造函数
*/

// parent表示父类的名字
class Person {

	protected $national='中国';

	public function __construct() {
		echo '父类构造方法<br>';
	}
}

class Student extends Person {

	public function __construct() {
		// Person::__construct();	//调用父类的构造函数1
		parent::__construct();		//调用父类的构造函数2 【推荐】
		echo '子类构造函数<br>';
	}

	public function show() {
		// $p = new Person();	//实例化父类1
		$p = new parent();		//实例化父类2 【推荐】
		echo $p->national;
	}
}

$stu=new Student();
$stu->show();