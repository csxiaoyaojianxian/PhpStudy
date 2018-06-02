<?php
header('content-type:text/html;charset=utf-8');
class A {
	private $name='PHP';
	public function showA() {
		var_dump($this);
		echo $this->name,'<hr>';	//PHP
	}
}
class B extends A {
	private $name='MySQL';
	public function showB() {
		var_dump($this);
		echo $this->name,'<hr>';	//MySQL
	}
}
//测试，private导致了$name没有被重写覆盖
$obj=new B();
$obj->showA();//object(B)#1 (2) { ["name":"B":private]=> string(5) "MySQL" ["name":"A":private]=> string(3) "PHP" } PHP
echo '<br>';
$obj->showB();//object(B)#1 (2) { ["name":"B":private]=> string(5) "MySQL" ["name":"A":private]=> string(3) "PHP" } MySQL


