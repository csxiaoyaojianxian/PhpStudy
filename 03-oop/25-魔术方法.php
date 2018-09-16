<?php

header('content-type:text/html;charset=utf-8');

// 魔术方法
class Student {
	// __tostring() 将对象当成字符串使用时自动调用
	public function __tostring() {
		return '这是Student对象，不能当字符串使用'.'<br>';
	}
	// __invoke() 将对象当成函数调用时自动调用
	public function __invoke($name) {
		echo "这是Student对象，不是函数，参数'{$name}'<br>";
	}

	private $name;
	private $sex;
	// 当给无法访问的属性赋值的时候自动调用
	public function __set($key,$value) {
		$this->$key=$value;
	}
	// 当给无法访问的属性取值的时候自动调用
	public function __get($key) {
		return $this->$key;
	}
	// 当用unset()销毁无法访问的属性的时候自动调用
	public function __unset($key) {
		unset($this->$key);
		echo '销毁成功<br>';
	}
	// 当用isset()函数判断无法访问的属性的时候自动调用
	public function __isset($key) {
		return isset($this->$key);
	}
	/**
	 * 当调用一个不存在的普通方法时自动调用
	 * @param $fn_name string 	方法名
	 * @param $fn_args array	参数数组
	 */
	public function __call($fn_name, $fn_args) {
		echo "学生类中没有{$fn_name}方法<br>";
		print_r($fn_args);
	}
	/**
	 * 当调用一个不存在的的静态方法的时候自动调用
	 */
	public static function __callstatic($fn_name, $fn_args) {
		echo "<br>没有{$fn_name}静态方法<br>";
		print_r($fn_args);
	}

}

$stu=new Student;
// __tostring()
echo $stu;
// __invoke()
$stu('李白');
// __set()
$stu->name='tom';
// __get()
echo $stu->name,'<br>';		// tom
// __unset()
unset($stu->name);			// 销毁成功
// __isset()
$stu->sex='男';
var_dump(isset($stu->sex));	// bool(true)
// __call()
$stu->show(10,20,30);
// __callstatic()
Student::display();
