<?php
/**
 * @Author: sunshine
 * @Date:   2018-06-01 11:32:35
 * @Last Modified by:   sunshine
 * @Last Modified time: 2018-06-02 09:21:27
 */

header('content-type:text/html;charset=utf-8');

// 【static::静态成员】表示当前对象所在的类，称为延时绑定，static表示的是一个类，具体表示什么类在运行时确定
// 【self】表示当前类的名字

class Person {
	public static $type='人类';
	public function showPerson() {
		var_dump($this);	//object(Student)#1 (0) { } 
		echo self::$type;	//人类
		echo static::$type;	//学生	【静态延时绑定】
	}
}
class Student extends Person {
	public static $type='学生';
	public function showStu() {
		var_dump($this);	//object(Student)#1 (0) { } 
		echo self::$type;	//学生
		echo static::$type;	//学生	【静态延时绑定】
	}
}

$stu=new Student;
$stu->showPerson();
echo '<hr>';
$stu->showStu();
