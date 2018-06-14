<?php

/**
 * @Author: sunshine
 * @Date:   2018-06-13 22:21:12
 * @Last Modified by:   sunshine
 * @Last Modified time: 2018-06-14 00:08:14
 */

/*
1、Apache 启动与停止
$ net start apache2.2
$ net stop apache2.2

2、主配置文件路径
Apache2/conf/httpd.conf

3、配置文件语法检查命令
$ httpd.exe -t

4、配置环境变量，显示
$ set path

【 基本配置 】
1、DocumentRoot
描述：修改网站根目录
语法：DocumentRoot “e:/lesson/day1”
提示：配置文件中的斜杠，尽量使用反斜杠(/)

2、DirectoryIndex
描述：指定网站的默认首页
语法：DirectoryIndex filename1 filename2 filename3 ...
提示：可以同时指定多个首页文件，那个先存在，就执行哪一个
提示：首页文件名一般为：index.html、index.php、default.html、default.php

3、<Directory></Directory>目录权限
当修改了网站根目录的位置，必须重新指定该目录的权限
使用<Directory></Directory>来指定目录访问权限

DocumentRoot "E:/data/data"
<Directory "E:/data/data">
	# 决定启用哪些服务器的特性（功能）
	# Options有三个取值
	# 	All 开启目录的所有权限
	# 	None 禁止访问目录的所有内容
	# 	Indexes 如果首页不存在，则显示目录列表
	Options All | None | Indexes
	# 指定Deny和Allow的执行顺序
	Order Deny,Allow
	# 禁止哪些人访问：All禁止所有、None任何人都能访问、禁止指定IP
	Deny from All
	# 允许哪些人访问：All允许所有、None不允许访问、允许指定IP
	Allow from All
</Directory>



 */