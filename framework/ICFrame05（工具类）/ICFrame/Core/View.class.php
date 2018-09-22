<?php

	//视图类

	//命名空间
	namespace Core;

	class View{
		//属性：保存控制器需要模板解析的数据
		//private $data = array();

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
			//name表示视图文件HTML中要替换的名字，value就是替换目标
			//$this->data[$name] = $value;

			$this->smarty->assign($name,$value);
		}

		//显示数据
		public function display($tpl){
			//用Smarty替代
			$this->smarty->display($tpl);

			/*
			//tpl代表视图文件的名字

			//读取模板内容
			$string = file_get_contents(APP_DIR . PLAT . '/View/' . $tpl);

			//替换：模板中的标记模式{name}
			foreach($this->data as $name => $value){
				$string = str_replace('{' . $name . '}',$value,$string);
			}

			//输出
			echo $string;
			*/
		}
	}