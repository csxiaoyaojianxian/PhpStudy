<?php

/**
 * @Author: sunshine
 * @Date:   2018-06-13 22:21:12
 * @Last Modified by:   csxiaoyao
 * @Last Modified time: 2018-06-16 02:33:42
 */

/*
【 Apache 启动与停止 】
$ net start apache2.2
$ net stop apache2.2

【 Apache 主配置文件路径 】
Apache2/conf/httpd.conf

【 Apache 配置文件语法检查命令 】
$ httpd.exe -t

【 windows显示系统环境变量 】
$ set path

【 Apache 基本配置 】
1、Listen
监听本地计算机IP地址或端口的请求 Listen [IP地址]:[端口号]
举例：Listen 8080

2、DocumentRoot
修改网站根目录，尽量使用反斜杠(/)
举例：DocumentRoot "c:/www"

3、DirectoryIndex
指定网站的默认首页
举例：DirectoryIndex index.html index.php default.html default.php

3、<Directory></Directory>目录权限
当修改了网站根目录的位置，必须重新指定该目录的权限，使用<Directory></Directory>来指定目录访问权限
举例：
DocumentRoot "E:/data/data"
<Directory "E:/data/data">
	# 决定启用哪些服务器的特性（功能）
	# Options有三个取值
	# 	All 开启目录的所有权限
	# 	None 禁止访问目录的所有内容
	# 	Indexes 如果首页不存在，则显示目录列表
	Options All | None | Indexes
	# 指定Deny和Allow的执行顺序，顺序在后的覆盖顺序在前的
	Order Deny,Allow
	# 禁止哪些人访问：All禁止所有、None任何人都能访问、禁止指定IP
	Deny from All
	# 允许哪些人访问：All允许所有、None不允许访问、允许指定IP
	Allow from All
</Directory>

【 Apache 虚拟主机配置步骤 】
1、配置host
举例：
127.0.0.1 localhost
127.0.0.1 www.csxiaoyao.com

2、修改Apache的主配置文件 httpd.conf
建议引入Apache虚拟主机配置文件 httpd-vhosts.conf
举例：
Include conf/extra/httpd-vhosts.conf

3、NameVirtualHost
举例：
# 所有IP地址的80端口都可以访问不同域名的虚拟主机
NameVirtualHost *:80
# 指定IP(本地网卡地址)的80端口可以访问不同域名的虚拟主机
NameVirtualHost 192.168.0.1:80
# 仅本机可以访问不同域名的虚拟主机
NameVirtualHost 127.0.0.1:80

4、配置
举例：
NameVirtualHost *:80
# 虚拟主机www.csxiaoyao.com的详细配置
<VirtualHost *:80>
	# 绑定的域名
	ServerName www.csxiaoyao.com
	# 指定默认首页
	DirectoryIndex index.html index.php
	# 指定网站根目录
	DocumentRoot "c:/www"
	# 目录权限
	<Directory "c:/www">
		Options Indexes
		Order Deny,Allow
		Deny from All
		Allow from 127.0.0.1
	</Directory>
</VirtualHost>

【 Apache 配置php 】
1、查看Apache已加载的插件
$ httpd.exe -M

2、LoadModule
在Apache的主配置文件httpd.conf中，使用LoadModule命令，来加载PHP5的模块
举例：
LoadModule php5_module "c:/wamp/php5/php5apache2_2.dll"

3、AddType
将.php扩展名与PHP文件的类型绑定
举例：
AddType application/x-httpd-php .php .phtml .abc

4、PHPiniDir
Apache引入php配置文件，指定加载php配置文件的路径
举例：
PHPiniDir "c:/wamp/PHP5"

【 php.ini 】
PHP配置文件
从php安装目录下找到开发/生产模式的php配置文件模板，复制并修改
例如修改时区：
date.timezone = PRC

【 php 加载 mysql 模块(windows) 】
修改 php.ini
举例：
extension_dir = "ext"
extension = php_mysql.dll

【 mysql 】
$ net stop mysql
$ net start mysql
$ mysql.exe -hlocalhost -uroot -proot

【 显示所有配置信息 】
<?php
	phpinfo();
?>

 */