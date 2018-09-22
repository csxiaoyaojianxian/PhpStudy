<?php

	//用户模型

	//命名空间
	namespace Model;

	//引入空间元素
	use \Core\Model;

	class User extends Model{
		//属性
		protected $table = 'user';
		
		//获取一个用户信息
		public function getUser(){
			//连接认证

			//组织SQL
			$sql = "select * from my_student limit 1";

			//执行
			return $this->dao->db_getOne($sql);
			//解析结果
			//返回结果
			//return array('id'=>1,'username'=>'Tom','age'=>30);
		}
	}