<?php
/**
*Books继承了Goods类
*/
class BooksLib extends GoodsLib {
	//重写父类的方法
	public function getName() {
		echo "《{$this->name}》<br>";
	}
}
