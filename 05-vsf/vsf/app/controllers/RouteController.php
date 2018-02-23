<?php
/**
 * Created by PhpStorm.
 * User: victorsun
 * Date: 2017/7/13
 * Time: 15:24
 */

header('Content-type: text/json;charset=utf-8');
header("Access-Control-Allow-Origin:*");

/*
// 显示错误信息
ini_set('display_errors',1);
// php启动错误信息
ini_set('display_startup_errors',1);
// 打印所有错误信息     
error_reporting(-1);
// 将错误信息输出到一个文本文件
ini_set('error_log', dirname(__FILE__) . '/error_log.txt');
*/

require(APP_PATH . 'vendor/Controller.php');

// require(APP_PATH . 'vendor/Redis.php');

// 导入链接数据
require(APP_PATH . 'config/link.php');

class RouteController extends Controller
{
    /*
     * link 路由转发
     * 两步操作：
     * 1. 二级域名检查
     * 2. 链接跳转
     * 例如：http://csxiaoyao.cn/php/route/link/db
     * 此处$des为db
     */
    public function link($des="index"){
        $hostList = getHostList();
        if(isset($hostList[$_SERVER["HTTP_HOST"]]) && $hostList[$_SERVER["HTTP_HOST"]] != ""){
            $des = $hostList[$_SERVER["HTTP_HOST"]];
        }
        $linkList = getLinkList();
        header("Location: ".$linkList[$des]);
    }

}