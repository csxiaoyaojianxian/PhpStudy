<?php
/**
*Books继承了Goods类
*/
class Books extends Goods {
	//重写父类的方法
	public function getName() {
		echo "《{$this->name}》<br>";
	}
}
