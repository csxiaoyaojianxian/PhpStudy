<?php
/**
 * @Author: sunshine
 * @Date:   2018-06-01 11:32:35
 * @Last Modified by:   sunshine
 * @Last Modified time: 2018-06-02 10:48:27
 */

abstract class Person{}
class Student extends Person{}
class Employee extends Person {}
class Teacher {}
	
// 函数调用只能传入Person类型的对象
// 参数约束：Php5.3以后才支持的功能，只能约束对象，不能约束基本类型
function show(Person $obj) {//父类可以指向子类的引用
	var_dump($obj);
}
show(new Student);	//object(Student)#1 (0) { } 
show(new Employee);	//object(Employee)#1 (0) { } 
show(new Teacher);	//报错
