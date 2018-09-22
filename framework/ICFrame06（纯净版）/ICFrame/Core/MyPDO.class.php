<?php

	//封装底层系统PDO类

	//命名空间
	namespace Core;

	//使用异常处理
	//引入空间元素
	use \PDO;
	use \PDOException;

	class MyPDO{
		//属性：连接数据库数据
		private $type;
		private $host;
		private $port;
		private $user;
		private $pass;
		private $dbname;
		private $charset;

		//属性：保存系统PDO对象
		private $pdo;	

		//构造方法：初始化PDO连接
		public function __construct($pdoinfo = array()){
			//引入配置文件
			global $config;

			//初始化属性
			$this->type = isset($pdoinfo['type']) ? $pdoinfo['type'] : $config['type'];
			$this->host = isset($pdoinfo['host']) ? $pdoinfo['host'] : $config[$this->type]['host'];
			$this->port = isset($pdoinfo['port']) ? $pdoinfo['port'] : $config[$this->type]['port'];
			$this->user = isset($pdoinfo['user']) ? $pdoinfo['user'] : $config[$this->type]['user'];
			$this->pass = isset($pdoinfo['pass']) ? $pdoinfo['pass'] : $config[$this->type]['pass'];
			$this->dbname = isset($pdoinfo['dbname']) ? $pdoinfo['dbname'] : $config[$this->type]['dbname'];
			$this->charset = isset($pdoinfo['charset']) ? $pdoinfo['charset'] : $config[$this->type]['charset'];

			//利用PDO建立连接：异常处理
			try{
				$this->pdo = new PDO("{$this->type}:host={$this->host};port={$this->port};dbname={$this->dbname};charset={$this->charset}",$this->user,$this->pass);

				//异常处理
				$this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

			}catch(PDOException $e){
				//连接失败：开发过程中直接报错并终止，如果是生产环境中，应该写入到系统日志当中
				echo 'PDO初始化数据库连接失败！<br/>';
				echo '失败文件为：' . $e->getFile() . '<br/>';
				echo '失败行为：'	. $e->getLine() . '<br/>';
				echo '失败原因为：' . $e->getMessage() . '<br/>';
				exit;	//终止脚本继续执行
			}

		}

		/*
		 * 写入数据
		 * @param1 string $sql，要执行的SQL写指令（增删改）
		 * @return int，受影响的行数
		*/
		public function db_exec($sql){
			//调用PDO方法中的exec执行
			try{
				return $this->pdo->exec($sql);
			}catch(PDOException $e){
				echo 'SQL执行失败<br/>';
				echo '失败SQL指令为：' . $sql . '<br/>';
				echo '失败行为：'	. $e->getLine() . '<br/>';
				echo '失败原因为：' . $e->getMessage() . '<br/>';
				exit;	//终止脚本继续执行
			}
		}

		/*
		 * 获取自增长ID
		 * @return int，自增长ID
		*/
		public function db_insertID(){
			//调用PDO方法中的lastInsertId执行
			return $this->pdo->lastInsertId();
		}

		/*
		 * 读取一条数据
		 * @param1 string $sql，要执行的SQL读指令
		 * @return array，返回一个一维数组
		*/
		public function db_getOne($sql){
			//调用自己封装的获取数据方法：db_query
			return $this->db_query($sql);
		}

		/*
		 * 读取多条数据
		 * @param1 string $sql，要执行的SQL读指令
		 * @return array，返回一个二维数组
		*/
		public function db_getAll($sql){
			//调用自己封装的获取数据方法：db_query
			return $this->db_query($sql,true);
		}

		/*
		 * 读取数据
		 * @param1 string $sql，要执行的SQL读指令
		 * @param2 bool $all = false，要执行的SQL读指令
		 * @return array，返回一个数组
		*/
		private function db_query($sql,$all = false){
			//调用PDO方法中的query执行
			try{
				$stmt = $this->pdo->query($sql);
				return $all ? $stmt->fetchAll(PDO::FETCH_ASSOC) : $stmt->fetch(PDO::FETCH_ASSOC);
			}catch(PDOException $e){
				echo 'SQL执行失败<br/>';
				echo '失败SQL指令为：' . $sql . '<br/>';
				echo '失败行为：'	. $e->getLine() . '<br/>';
				echo '失败原因为：' . $e->getMessage() . '<br/>';
				exit;	//终止脚本继续执行
			}
		}
	}