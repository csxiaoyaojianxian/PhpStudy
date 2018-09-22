<?php

	//用户模型

	//命名空间
	namespace Model;

	class User{
		
		//获取一个用户信息
		public function getUser(){
			//连接认证

			//组织SQL
			$sql = "select * from user limit 1";

			//执行
			//解析结果
			//返回结果
			return array('id'=>1,'username'=>'Tom','age'=>30);
		}
	}