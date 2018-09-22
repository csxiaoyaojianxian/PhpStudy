<?php

	//前台控制器

	//命名空间
	namespace Home\Controller;

	//引入空间元素
	use \Core\Controller;

	class Index extends Controller{
	
		//入口方法
		public function index(){
			echo '欢迎使用ICFrame自定义框架！';
		}
	}