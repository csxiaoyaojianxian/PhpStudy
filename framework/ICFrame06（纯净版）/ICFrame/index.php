<?php

	//项目单一入口文件

	//1、定义入口安全口令
	define('ACCESS',TRUE);

	//2、引入初始化文件：类（核心文件夹下）
	include_once 'Core/App.class.php';

	//3、触发类工作：通常，初始化类是静态资源
	\Core\App::run();							//类资源使用了命名空间