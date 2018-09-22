<?php

	//前台控制器

	//命名空间
	namespace Home\Controller;

	//引入空间元素
	use \Core\Controller;

	class Index extends Controller{
	
		//测试方法
		public function index(){
			//echo '欢迎使用ICFrame自定义框架！';

			//调用模型
			$m = new \Model\User();				//命名空间使用
			$user = $m->getUser();
			//var_dump($user);

			//调用视图
			//include_once APP_DIR . PLAT . '/View/user.html';

			//使用公共方法
			//$this->success('操作成功','');

			//调用视图类进行模板数据显示
			//$view = new \Core\View();

			//分配数据
			$this->view->assign('id',2);
			$this->view->assign('username','Jimmy');
			$this->view->assign('age',20);

			//显示数据
			$this->view->display('user1.html');
		}
	}