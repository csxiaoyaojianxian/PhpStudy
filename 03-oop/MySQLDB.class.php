<?php

class MySQLDB {
	private $host;//主机地址
	private $port;//端口号
	private $user;//用户名
	private $pass;//用户密码
	private $charset;//字符集
	private $dbname;//数据库名
	// 运行的时候需要的属性
	private $link;//用于存放连接资源
	// 增加私有的静态属性,用于保存单例对象
	private static $instance;
	/**
	 * 构造方法
	 * @param array $arr 关联数组,数据库连接需要的参数
	 */
	private function __construct($arr) {
		$this->host = isset($arr['host']) ? $arr['host'] : 'localhost';
		$this->port = isset($arr['port']) ? $arr['port'] : '3306';
		$this->user = isset($arr['user']) ? $arr['user'] : 'root';
		$this->pass = isset($arr['pass']) ? $arr['pass'] : '';
		$this->charset = isset($arr['charset']) ? $arr['charset'] : 'utf8';
		$this->dbname = isset($arr['dbname']) ? $arr['dbname'] : '';
		// 数据库连接三步曲操作
		// 1, 连接数据库
		$this->my_connect();
		// 2, 设置默认字符集
		$this->my_charset();
		// 3, 选择默认数据库
		$this->my_dbname();
	}
	/**
	 * 获得一个单例对象的公共方法
	 * @param array $arr
	 * @return self::$instance 当前类的一个对象
	 */
	public static function getInstance($arr) {
		if(!self::$instance instanceof self) {
			self::$instance = new self($arr);
		}
		return self::$instance;
	}
	private function my_connect() {
		// 如果连接成功,就将连接资源保存到对象的$link属性上
		if($link = @mysql_connect("$this->host:$this->port",$this->user,$this->pass)) {
			$this->link = $link;
		}else {
			// 连接失败
			echo "数据库连接失败！<br />";
			echo "错误编号：",mysql_errno(),'<br />';
			echo "错误信息：",mysql_error(),'<br />';
			// 终止脚本的运行
			die;
		}
	}
	/**
	 * SQL语句的执行方法
	 * @param string $sql 一条sql语句
	 * @return $result sql语句执行的结果
	 */
	public function my_query($sql) {
		// 首先也要执行sql语句
		$result = @mysql_query($sql);
		// 判断是否执行成功
		if(!$result) {
			// 执行失败
			// 连接失败
			echo "SQL语句执行失败！<br />";
			echo "错误编号：",mysql_errno(),'<br />';
			echo "错误信息：",mysql_error(),'<br />';
			// 终止脚本的运行
			die;
		}else {
			return $result;
		}
	}
	/**
	 * 返回查询的所有记录(多行多列)
	 * @param string $sql 需要执行的sql语句
	 * @return mixed(array|false) 执行成功就返回数组,失败就返回false
	 */
	public function fetchAll($sql) {
		// 执行sql语句
		if($result = $this->my_query($sql)) {
			// 执行成功
			// 提取资源结果集
			$rows = array(); //初始化一个空数组,保存所有的数据
			while($row = mysql_fetch_assoc($result)) {
				$rows[] = $row;
			}
			// 结果集使用完毕后,最好主动释放
			mysql_free_result($result);
			// 返回所有的数据
			return $rows;
		}else {
			// 执行失败
			return false;
		}
	}
	/**
	 * 返回查询的一条记录的结果集
	 * @param string $sql 需要执行的sql语句
	 * @return mixed(array|false) 执行成功就返回数组,失败就返回false
	 */
	public function fetchRow($sql) {
		// 执行sql语句
		if($result = $this->my_query($sql)) {
			// 执行成功
			// 提取资源结果集
			$row = mysql_fetch_assoc($result);
			// 结果集使用完毕后,最好主动释放
			mysql_free_result($result);
			// 返回所有的数据
			return $row;
		}else {
			// 执行失败
			return false;
		}
	}
	/**
	 * 返回查询的是第一条记录的第一个字段的值
	 * @param string $sql 需要执行的sql语句
	 * @return mixed(string|false) 执行成功就返回字符串,失败就返回false
	 */
	public function fetchColumn($sql) {
		// 执行
		if($result = $this->my_query($sql)) {
			// 执行成功
			$row = mysql_fetch_row($result); //得到一个索引数组
			// 结果集使用完毕后,最好主动释放
			mysql_free_result($result);
			// 返回数据
			return isset($row[0]) ? $row[0] : false;
		}else {
			// 执行失败
			return false;
		}
	}


	/**
	 * 设置默认的字符集
	 */
	private function my_charset() {
		$this->my_query("set names $this->charset");
	}
	/**
	 * 选择默认的数据库
	 */
	private function my_dbname() {
		$this->my_query("use $this->dbname");
	}
	/**
	 * 析构方法
	 */
	public function __destruct() {
		// 释放数据库连接资源
		@mysql_close($this->link);
	}
	/*
	 * 属性重载
	 */
	public function __set($name,$value) {
		$allow_set = array('host','port','user','pass','charset','dbname');
		if(in_array($name,$allow_set)) {
			$this->$name = $value;
		}
	}
	public function __get($name) {
		$allow_get = array('host','port','charset','dbname');
		if(in_array($name,$allow_get)) {
			return $this->$name;
		}else {
			return false;
		}
	}
	public function __unset($name) {
		// 什么都不做，代表无法删除任何的属性
	}
	public function __isset($name) {
		$allow_isset = array('host','port','user','pass','charset','dbname');
		if(in_array($name,$allow_isset)) {
			return true;
		}else {
			return false;
		}
	}
	/*
	 * 方法重载
	 */
	public function __call($name,$arr) {
		return false;
	}
	public static function __callstatic($name,$arr) {
		return false;
	}
	/**
	 * 克隆魔术方法
	 */
	private function __clone() {
		
	}
	/**
	 * __sleep魔术方法
	 */
	public function __sleep() {
		return array('host','port','user','pass','charset','dbname');
	}
	/**
	 * __wakeup魔术方法
	 */
	public function __wakeup() {
		// 初始化数据库三步曲
		// 连接数据库
		$this->my_connect();
		// 选择默认字符集
		$this->my_charset();
		// 选择默认的数据库
		$this->my_dbname();
	}
}