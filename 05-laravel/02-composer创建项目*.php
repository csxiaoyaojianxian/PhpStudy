<?php

/*
【 composer安装使用 】
前提条件：开启PHP中openssl扩展

【 使用composer方式部署laravel项目 】
1. 配置composer镜像：
$ composer config -g repo.packagist composer https://packagist.phpcomposer.com

2. composer创建一个名为laravel的laravel项目
$ composer create-project laravel/laravel --prefer-dist ./
// $ composer create-project laravel/laravel=5.4.* --prefer-dist ./

命令解释：
composer：表示执行composer程序；
create-project：通过composer去创建项目；
laravel/Laravel：需要创建的项目名称；
--prefer-dist：优先下载压缩包方式，而不是直接从github上下载源码（克隆）；
./：表示创建的项目目录名称，也可以是一个目录名；

3. 启动
方式1
$ php artisan serve
http://127.0.0.1:8000

方式2
配置虚拟主机 根路径为 /public

4. 建立数据库，修改.env文件

5. 设置网站本地化为中文
下载语言包
$ composer require caouecs/laravel-lang:~3.0
将需要的语言包复制到指定的位置
修改config/app.php文件中的配置locale
'locale'=>'zh-CN'

6. 设置项目使用的时区
修改系统默认的时区，修改配置文件：config/app.php 配置项：timezone
配置项的值：Aisa/shanghai	  Aisa/chongqing 	PRC

7. 清理项目（删除不需要的文件）
删除 app/Http/Controllers/Auth 目录，因为需要自定义登录逻辑
删除 database/migrations/xxx_create_users_table.php 和 xxx_create_password_resets_table.php 因为需要自定义用户表结构，同时也可以删除seeds目录下的初始文件
删除 resources/views/welcome.blade.php 欢迎页面
在Public目录下的js、css文件夹也可以进行删除

8. 关闭Mysql的严格模式
编辑 config/database.php 将 strict 由true修改为false
 严格模式的功能说明
  不支持对not null字段插入null值
  不支持对自增长字段插入”值
  不支持text字段有默认值

9. 安装debugbar工具条
$ composer require barryvdh/laravel-debugbar:~2.4

*/
