<?php
header('content-type:text/html;charset=utf-8');

class Person {
	protected $name;
	protected $sex;
	public function __construct($name,$sex) {
		$this->name=$name;
		$this->sex=$sex;
	}
}

class Student extends Person {
	private $score;
	public function __construct($name,$sex,$score) {
		parent::__construct($name,$sex);	//调用父类的构造函数
		$this->score=$score;
	}
	//显示值
	public function show() {
		echo "姓名：{$this->name}<br>";
		echo "性别：{$this->sex}<br>";
		echo "成绩：{$this->score}";
	}
}

//测试
$stu=new Student('李白','男','88');
$stu->show();