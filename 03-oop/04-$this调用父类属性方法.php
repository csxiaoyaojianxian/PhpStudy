<?php
/**
 * @Author: sunshine
 * @Date:   2018-06-01 11:32:35
 * @Last Modified by:   sunshine
 * @Last Modified time: 2018-06-01 23:55:16
 */

ini_set('display_errors','On');
header('content-type:text/html;charset=utf-8');

class Person {
	protected $name='李白';
	protected function getName() {
		echo "父类方法获取父类属性：{$this->name}",'<br>';
	}
}
class Student extends Person {
	public function show() {
		echo $this->name,'<br>';	//调用父类的属性
		$this->getName();			//调用父类的方法
	}
}
//测试
$stu=new Student;
$stu->show();