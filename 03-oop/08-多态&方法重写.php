<?php
header('content-type:text/html;charset=utf-8');

// 1. 子类和父类的方法名必须一致
// 2. 子类重写的方法可以和父类方法的参数个数不一致
// 3. 子类中覆盖的方法不能比父类的方法访问权限更加严格

// 方法重写，参数个数可以不一致
class Animal {
	protected function jiao() {
		echo '动物会叫<br>';
	}
}
class Dog extends Animal {
	public function jiao($n) {
		echo "我的狗一天叫{$n}次";
	}
}
$dog=new Dog;
$dog->jiao(3);