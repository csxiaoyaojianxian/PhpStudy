<?php
/**
 * 单例模式：一个类只能有一个对象
 * !!! 三私一公
 */
class MySQLDB {
	// 私有成员保存类实例
	private static $instance;
	// 私有构造函数阻止在类外部实例化
	private function __construct() {
		// ...
	}
	// 私有__clone()阻止clone对象
	private function __clone() {

	}
	// 公有方法获取类实例
	public static function getInstance() {
		if(!self::$instance instanceof self){
			self::$instance = new self;
		}
		return self::$instance;
	}
}
$db1 = MySQLDB::getInstance();
$db2 = MySQLDB::getInstance();
var_dump($db1,$db2);
// object(MySQLDB)#1 (0) { } object(MySQLDB)#1 (0) { }
