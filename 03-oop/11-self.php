<?php
/**
 * @Author: sunshine
 * @Date:   2018-06-01 11:32:35
 * @Last Modified by:   sunshine
 * @Last Modified time: 2018-06-02 09:35:46
 */

header('content-type:text/html;charset=utf-8');

class User {
	public static $count=0;
	private $name='tom';
	public function __construct() {
		// self表示当前类名，等同于 User::$count++;
		self::$count++;
	}
	public function __destruct() {
		self::$count--;
	}
	public function showCount() {
		return self::$count;
	}
	public static function show() {
		// self表示当前类名，可以直接new
		$stu = new self;
		return $stu->name;
	}
	public static function showCount2() {
		// !!! 非静态方法被self::调用，自动转成静态方法
		return @self::showCount();
	}
}
$user1=new User();
$user2=new User();
$user3=new User();
echo User::show() . '<br>';
echo User::showCount2() . '<br>';
echo '现在有'.$user1->showCount().'人在线<br>';
unset($user1);
echo '现在有'.$user2->showCount().'人在线<br>';
