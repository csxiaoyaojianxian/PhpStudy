<?php

	//公共模型类

	//命名空间
	namespace Core;

	//引入空间元素
	use \Core\MyPDO;

	class Model{
		//属性：保存DAO对象
		protected $dao;

		//构造方法：数据库的连接认证
		public function __construct(){
			//连接认证
			$this->dao = new MyPDO();
		}
		
		//通过id获取一条记录
		protected function getDataById($id){
			//组织SQL
			$sql = "select * from {$this->table} where id = {$id}";

			//执行
			return $this->dao->db_getOne($sql);
		}
	}