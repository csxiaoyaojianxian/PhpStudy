<?php
/**
 * @Author: sunshine
 * @Date:   2018-06-01 11:32:35
 * @Last Modified by:   sunshine
 * @Last Modified time: 2018-06-02 10:11:39
 */

header('content-type:text/html;charset=utf-8');

//抽象类
abstract class ABSClass{
	abstract function test1();
}
//接口
interface IPict {
	function test2();
}

// 必须先继承类，后实现接口
class MyClass extends ABSClass implements IPict {
	public function test1() {}
	public function test2() {}
}