<?php
header('content-type:text/html;charset=utf-8');
class Person {
	private $name;
	public function getName() {
		echo '人总是有名字的<hr>';
	}
}
//Student类继承了Person类
class Student extends Person {
    
}
//测试
$stu=new Student;
$stu->getName();	//人总是有名字的
var_dump($stu);	//object(Student)#1 (1) { ["name":"Person":private]=> NULL }

