<?php
/**
 * @Author: sunshine
 * @Date:   2018-06-01 11:32:35
 * @Last Modified by:   sunshine
 * @Last Modified time: 2018-06-02 10:09:33
 */

header('content-type:text/html;charset=utf-8');

// 1. 接口是一个特殊的抽象类，如果一个类中所有方法都是抽象方法，那么这个类可以声明成接口
// 2. 接口中的抽象方法只能是public，默认也是public
// 3. 不能通过final和abstract修饰接口中的抽象方法
// 4. 接口中可以放抽象方法和常量，不能放属性
// 5. 通过implements类实现接口

interface IPict1 {
	function test1();
}
interface IPict2 {
	function test2();
}
//接口允许多重实现
class MyClass implements IPict1,IPict2 {
	public function test1() {
		echo '实现接口1的test1方法<br>';
	}
	public function test2() {
		echo '实现接口2的test2方法<br>';
	}
}
$obj=new MyClass();
$obj->test1();
$obj->test2();