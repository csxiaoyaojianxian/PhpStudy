<?php

/*

php.ini配置文件需要开启的扩展：
extension=php_openssl.dll
extension=php_pdo_mysql.dll
extension=php_mbstring.dll
extension=php_fileinfo.dll（验证码代码依赖需要该扩展）
extension=php_curl.dll（主要用于请求的发送）

httpd.conf配置文件需要开启的模块:
LoadModule deflate_module modules/mod_deflate.so
LoadModule rewrite_module modules/mod_rewrite.so

*/