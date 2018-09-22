<?php

	//公共控制器

	//命名空间
	namespace Core;

	//引入视图类
	//use \Core\View;

	class Controller{

		//实例化视图类
		protected $view;
		public function __construct(){
			$this->view = new View();
		}
		

		//公共方法
		protected function success($msg,$url,$time = 1){
			//跳转提示功能
			header("Refresh:{$time};url='index.php?{$url}'");
			echo $msg;

			//终止脚本
			exit();
		}

		protected function error($msg,$url,$time = 3){
			//跳转提示功能
			header("Refresh:{$time};url='index.php?{$url}'");
			echo $msg;

			//终止脚本
			exit();
		}
	}