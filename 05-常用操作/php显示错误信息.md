# php显示错误信息
## 方法一 修改php.ini
;显示错误信息  
display_errors = On  
;显示php开始错误信息  
display_startup_errors = On  
;日志记录错误信息  
log_errors = On  

## 方法二 调试php文件首行中打开
// 第一步：开启显示错误信息
ini_set('display_errors',1); // 方法1
ini_set('display_errors','on'); // 方法2
// 可选：php启动错误信息
ini_set('display_startup_errors',1);

// 第二步：设置打印错误信息级别
// 1 E_ERROR 运行时致命的错误。不能修复的错误。终止执行脚本。
// 2 E_WARNING 运行时非致命的错误。不终止执行脚本。
// 3 E_PARSE 编译时语法解析错误。解析错误仅仅由分析器产生。
error_reporting(0); // 关闭错误报告
error_reporting(-1); // 打印所有错误
error_reporting(E_ALL); // 打印所有错误
ini_set("error_reporting", E_ALL); // 打印所有错误
error_reporting(E_ERROR); // 打印运行时致命错误
error_reporting(E_ALL & ~E_NOTICE); // 打印 E_NOTICE 之外的所有错误

## 备注：常用配置，直接复制粘贴于php文件头部
<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
// error_reporting(E_ERROR);
error_reporting(E_ALL);