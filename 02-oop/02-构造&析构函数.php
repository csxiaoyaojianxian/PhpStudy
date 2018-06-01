<?php
/**
 * @Author: sunshine
 * @Date:   2018-06-01 11:32:35
 * @Last Modified by:   sunshine
 * @Last Modified time: 2018-06-01 23:21:49
 */

ini_set('display_errors','On');
header('content-type:text/html;charset=utf-8');

class Student {
	private $name;
	//构造函数
	public function __construct($name) {
		$this->name=$name;
		echo "构造{$name}<br>";
	}
	//析构函数
	public function __destruct() {
		echo "销毁{$this->name}<br>";
	}
}

$stu1=new Student('李白');
unset($stu1);	//销毁$stu1
$stu2=new Student('杜甫');
$stu2=10;		//销毁$stu2
$stu3=new Student('白居易');
$stu4=new Student('李清照');
// 销毁李清照  注意顺序！栈结构
// 销毁白居易