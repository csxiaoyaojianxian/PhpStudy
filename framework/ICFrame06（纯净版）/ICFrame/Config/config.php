<?php

	//配置文件

	//返回配置数组
	return array(
		//数据库信息
		'type' => 'mysql',

		'mysql' => array(
			'host' => 'localhost',
			'port' => '3306',
			'user' => 'root',
			'pass' => 'root',
			'dbname' => 'mydb',
			'charset' => 'utf8',
			'prefix' => '' 
		),
	
		//其他配置项
	);