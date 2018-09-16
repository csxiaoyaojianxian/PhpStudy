<?php
/**
 * @Author: sunshine
 * @Date:   2018-06-01 11:32:35
 * @Last Modified by:   sunshine
 * @Last Modified time: 2018-06-02 09:59:24
 */

header('content-type:text/html;charset=utf-8');

// 如果一个类中有一个方法是抽象方法，那么这个类就是抽象类
// 抽象类的作用：
// 1. 定义统一的方法名称
// 2. 防止实例化

//抽象类
abstract class Goods {
	protected $name;
	public function setName($name) {
		$this->name=$name;
	}
	abstract public function getName();	//抽象方法
}
//实现抽象类
class Book extends Goods {
	public function getName() {	//抽象方法必须被重写后才能被实例化
		echo "《{$this->name}》";
	}
}
//测试
$book=new Book();
$book->setName('PHP入门到精通');
$book->getName();