<?php

ini_set('display_errors','On');
header('content-type:text/html;charset=utf-8');

class Student {
	// 访问修饰符 属性
	private $name;	//属性也叫成员变量
	private $sex;
	// 方法
	public function setInfo($name,$sex) {
		if($name==''){
			echo '姓名不能为空';
			exit;
		}
		if($sex!='男' && $sex!='女'){
			echo '性别不正确';
			exit;
		}
		// 赋值 $this表示调用当前方法的对象
		$this->name=$name;
		$this->sex=$sex;
	}
	//取值
	public function getInfo() {
		echo "姓名：{$this->name}",'<br>';
		echo '性别：'.$this->sex,'<hr>';
	}
}
/**
 * Student
 */
$stu1 = new Student; // ()可以省略
$stu2=new Student(); //实例化一个对象，并且将对象赋值给 $stu2 变量

/**
 * 属性操作
 */
// 增加属性
$stu1->place='Shanghai';
// 调用属性
echo $stu1->place;
// 判断属性是否存在
var_dump(isset($stu1->place));
// 删除属性
unset($stu1->place);
// 注意访问修饰符
$stu1->place = "csxiaoyao";
// $stu1->name='cs'; // 给私有变量赋值，报错

/**
 * 方法操作
 */
$stu1->setInfo('sunshine','男');
$stu1->getInfo();
$stu2->getInfo();
