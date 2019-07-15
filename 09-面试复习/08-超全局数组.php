<?php
// 超全局数组

var_dump($GLOBALS);

var_dump($_GET);
var_dump($_POST);
var_dump($_REQUEST);

var_dump($_SESSION);
var_dump($_COOKIE);

var_dump($_SERVER);
    // var_dump($_SERVER['SERVER_ADDR']); // 服务器IP地址
    // var_dump($_SERVER['REMOTE_ADDR']); // 客户端IP地址
    // var_dump($_SERVER['SERVER_NAME']);
    // var_dump($_SERVER['REQUEST_TIME']);
    // var_dump($_SERVER['REQUEST_URI']);
    // var_dump($_SERVER['QUERY_STRING']);
    // var_dump($_SERVER['HTTP_REFERER']); // 上级页面，可能为空
    // var_dump($_SERVER['HTTP_USER_AGENT']);
    // var_dump($_SERVER['PATH_INFO']);

    // http://www.csxiaoyao.com/index.php/user/reg?status=ghost
    // ['QUERY_STRING']  status=ghost
    // ['PATH_INFO']     user/reg

var_dump($_FILES);

var_dump($_ENV);
