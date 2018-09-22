<?php

// 初始化文件

// 命名空间
namespace Core;

// 权限判定
if(!defined('ACCESS')) header('Location:../index.php');

// 定义类
class App {
    // 2. 初始化字符集
    private static function initCharset() {
        header('Content-type:text/html;charset:utf-8;');
    }
    // 3. 增加目录常量
    private static function initDirConst() {
        // echo str_replace('\\','/', __DIR__); // 针对windows的 \ 进行处理
        define('ROOT_DIR', str_replace('Core','',str_replace('\\','/', __DIR__)));
        define('CORE_DIR', ROOT_DIR . 'Core/');
        define('APP_DIR', ROOT_DIR . 'App/');
        define('CONFIG_DIR', ROOT_DIR . 'Config/');
        define('PUBLIC_DIR', ROOT_DIR . 'Public/');
        define('UPLOAD_DIR', ROOT_DIR . 'Upload/');
        define('VENDOR_DIR', ROOT_DIR . 'Vendor/');
    }
    // 4. 设定系统控制
    private static function initSystem() {
        @ini_set('error_reporting', E_ALL); // 错误级别控制
        @ini_set('display_errors', 1); // 是否显示错误
    }
    // 5. 设定配置文件
    private static function initConfig() {
        // 全局化配置文件
        global $config;
        // 加载config下的配置文件
        $config = include_once CONFIG_DIR . 'config.php';
    }
    // 6. 初始化URL
    private static function initURL() {
        $plat = isset($_REQUEST['p']) ? $_REQUEST['p'] : 'Home';
        $module = isset($_REQUEST['m']) ? $_REQUEST['m'] : 'Index';
        $action = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'index';
        define(PLAT, $plat);
        define(MODULE, $module);
        define(ACTION, $action);
    }
    // 7. 设定自动加载
    private static function initAutoload(){
        // 将用户自定义的方法注册到自动加载机制中
        
    }

    // 从URL获取平台、控制器、方法



    // 1. 运行方法
    public static function run() {
        self::initCharset();
        self::initDirConst();
        self::initSystem();
    }


}