<?php

// $this表示当前对象的引用
class Goods {
	public function __construct() {
		var_dump($this); 
	}
}

class Book extends Goods {
    
}

// 判断题：$this表示$this所在类的对象（x）
new Goods();	//object(Goods)#1 (0) { }
echo '<hr>';
new Book();		//object(Book)#1 (0) { }
