<?php

// protected修饰的成员可以在整个继承链上访问
// PHP不允许多重继承，即C不能同时继承A和B，可以将C继承B，B再继承A

// 当子类重写父类的成员时，子类成员的访问控制权限不应该低于父类的访问控制权限
// 父类：public   子类：只能是public
// 父类：protected 子类：可以是protected也可以是pubic

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