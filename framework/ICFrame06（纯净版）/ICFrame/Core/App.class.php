<?php

	//初始化文件

	//命名空间
	namespace Core;

	//权限判定
	if(!defined('ACCESS')) header('Location:../index.php');

	//定义类
	class App{
		//2.初始化字符集
		private static function initCharset(){
			header('Content-type:text/html;charset=utf-8');
		}

		//3.增加目录常量
		private static function initDirConst(){
			//echo __DIR__;							//__DIR__是动态获取的，但是在windows获取的目录分隔符是反斜杠，最好替换成正斜杠
			define('ROOT_DIR', str_replace('Core','',str_replace('\\','/',__DIR__)));
			//既然定义的是目录，那么都应该有目录结尾符号"/"
			define('CORE_DIR',ROOT_DIR . 'Core/');
			define('APP_DIR',ROOT_DIR . 'App/');
			define('CONFIG_DIR',ROOT_DIR . 'Config/');
			define('PUBLIC_DIR',ROOT_DIR . 'Public/');
			define('UPLOAD_DIR',ROOT_DIR . 'Upload/');
			define('VENDOR_DIR',ROOT_DIR . 'Vendor/');
		}

		//4.设定系统控制
		private static function initSystem(){
			@ini_set('error_reporting',E_ALL);	//错误级别控制
			@ini_set('display_errors',1);		//是否显示错误
		}

		//5.设定配置文件
		private static function initConfig(){
			//全局化配置文件
			global $config;
			//加载配置文件：在Config目录下
			$config = include_once CONFIG_DIR . 'config.php';
		}

		//6.初始化URL：从URL中获取三个数据：平台，控制器，方法
		private static function initURL(){
			//获取三个数据
			$plat = isset($_REQUEST['p']) ? $_REQUEST['p'] : 'Home';
			$module = isset($_REQUEST['m']) ? $_REQUEST['m'] : 'Index';
			$action = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'index';

			//这几个内容会使用比较多：全局化每次都需要引入比较麻烦，定义常量
			define('PLAT',$plat);
			define('MODULE',$module);
			define('ACTION',$action);
		}

		//7.设定自动加载
		private static function initAutoload(){
			//将用户自定义的方法注册到自动加载机制中：注册的时候，最容易用到的最先注册
			spl_autoload_register(array(__CLASS__,'loadCore'));	//__CLASS__::loadCore()
			spl_autoload_register(array(__CLASS__,'loadController'));	
			spl_autoload_register(array(__CLASS__,'loadModel'));	
			spl_autoload_register(array(__CLASS__,'loadVendor'));	
		}
		//增加多个方法：加载不同文件夹的类
		private static function loadCore($clsname){
			//组合文件
			$file = CORE_DIR . basename($clsname) . '.class.php';
			if(is_file($file)){
				include_once $file;
			}
		}
		private static function loadVendor($clsname){
			//组合文件
			$file = VENDOR_DIR . basename($clsname) . '.class.php';
			if(is_file($file)){
				include_once $file;
			}
		}

		private static function loadController($clsname){
			//组合文件
			$file = APP_DIR . PLAT .'/Controller/'. basename($clsname) . '.class.php';
			if(is_file($file)){
				include_once $file;
			}
		}

		private static function loadModel($clsname){
			//组合文件
			$file = APP_DIR . 'Model/' . basename($clsname) . '.class.php';
			if(is_file($file)){
				include_once $file;
			}
		}

		//8.分发控制器
		private static function initDispatch(){
			//找到控制器类，实例化调用方法
			//$module = MODULE;
			$action = ACTION;

			//补充空间
			//Home：Home\Controller;
			//Back：Back\Controller;
			$module = "\\" . PLAT . "\\Controller\\" . MODULE;	//\Home\Controler\Index
		
			//实例化
			$m = new $module();
			$m->$action();			//可变方法

		}

		//1.运行方法
		public static function run(){
			//加载各种要初始化的功能方法
			self::initCharset();
			self::initDirConst();
			self::initSystem();
			self::initConfig();
			self::initURL();
			self::initAutoload();	//思考：是否可以放到initURL方法之前
			self::initDispatch();
		}
	}