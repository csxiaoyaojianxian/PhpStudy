<?php
/**
 * @Author: sunshine
 * @Date:   2018-06-01 11:32:35
 * @Last Modified by:   sunshine
 * @Last Modified time: 2018-06-02 12:13:24
 */

header('content-type:text/html;charset=utf-8');

// 1. clone用来复制一个对象
// 2. 当执行clone命令的时候，会自动调用__clone()函数
class Student {
	private $is_clone=false;
	//当执行clone命令时会自动执行__clone()函数
	public function __clone() {
		$this->is_clone=true;
	}
}
$stu1=new Student;
var_dump($stu1);echo '<br>';//object(Student)#1 (1) { ["is_clone":"Student":private]=> bool(false) } 

$stu2=$stu1;//$stu1的地址付给$stu2,$stu1和$stu2指向同一个对象
var_dump($stu2);echo '<br>';//object(Student)#1 (1) { ["is_clone":"Student":private]=> bool(false) } 

$stu3=clone $stu1;
var_dump($stu3);echo '<br>';//object(Student)#2 (1) { ["is_clone":"Student":private]=> bool(true) } 

var_dump($stu3 instanceof Student);  // bool(true)