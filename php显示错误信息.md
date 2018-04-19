# php显示错误信息
## 方法一 修改php.ini
;显示错误信息  
display_errors = On  
;显示php开始错误信息  
display_startup_errors = On  
;日志记录错误信息  
log_errors = On  

## 方法二 调试php文件首行中打开
// 显示错误信息
ini_set('display_errors',1);
// php启动错误信息
ini_set('display_startup_errors',1);
// 打印所有错误信息 
error_reporting(-1);
// 将错误信息输出到一个文本文件
ini_set('error_log', dirname(__FILE__) . '/error_log.txt');