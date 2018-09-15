<?php

// protected修饰的成员可以在整个继承链上访问
// PHP不允许多重继承，即C不能同时继承A和B，可以将C继承B，B再继承A

class A {
	public function show() {
		echo $this->num; // 父类方法访问子类属性
	}
}

class B extends A{
	protected $num=10;
}

//测试
$obj=new B();
$obj->show();	//10 