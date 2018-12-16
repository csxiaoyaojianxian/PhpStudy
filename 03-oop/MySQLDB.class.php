<?php

class MySQLDB {
	public $host;//主机地址
	public $port;//端口号
	public $user;//用户名
	public $pass;//用户密码
	public $charset;//字符集
	public $dbname;//数据库名
	// 运行的时候需要的属性
	public $link;//用于存放连接资源
	/**
	 * 构造方法
	 * @param array $arr 关联数组,数据库连接需要的参数
	 */
	public function __construct($arr) {
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
	public function my_connect() {
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
	 * 设置默认的字符集
	 */
	public function my_charset() {
		$this->my_query("set names $this->charset");
	}
	/**
	 * 选择默认的数据库
	 */
	public function my_dbname() {
		$this->my_query("use $this->dbname");
	}
	/**
	 * 析构方法
	 */
	public function __destruct() {
		// 释放数据库连接资源
		@mysql_close($this->link);
	}
}