<?php
header('content-type:text/html;charset=utf-8');
$book=new BooksLib();
$phone=new PhoneLib();
$book->setName('PHP入门与精通');
$phone->setName('诺基亚2100');
$book->getName();
$phone->getName();

//通过命名规则加载类
function __autoload($class_name) {
	if(substr($class_name,-3)=='Lib'){
		require "./Lib/{$class_name}.class.php";
	}
}

