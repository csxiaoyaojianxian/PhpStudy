<?php

	//视图类

	//命名空间
	namespace Core;

	class View{
		//增加属性保存Smarty对象
		private $smarty;

		//构造方法：实例化Smarty
		public function __construct(){
			//引入Smarty
			include_once VENDOR_DIR . 'Smarty/Smarty.class.php';
			$this->smarty = new \Smarty();

			//设置
			$this->smarty->setTemplateDir(APP_DIR . PLAT . '/View/');
			$this->smarty->setCompileDir(APP_DIR . PLAT . '/View_c/');
		}

		//公开方法赋值
		public function assign($name,$value){
			$this->smarty->assign($name,$value);
		}

		//显示数据
		public function display($tpl){
			//用Smarty替代
			$this->smarty->display($tpl);		
		}
	}