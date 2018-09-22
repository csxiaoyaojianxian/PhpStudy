<?php
/**
 * 项目单一入口文件
 */

// 1. 入口设定，安全限定，只有访问index.php入口文件才能访问文件夹中的其他资源
define('ACCESS', TRUE);

// 2. 引入初始化文件
include_once 'Core/App.class.php';

// 3. 初始化
\Core\App::run();



// 引入系统初始化文件

// 让系统初始化文件执行
