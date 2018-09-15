<?php
/**
*商品的抽象类
*/
abstract class GoodsLib {
	protected $name;
	//设置商品名称
	final public function setName($name) {
		$this->name=$name;
	}
	//获取名称
	abstract public function getName();
}
