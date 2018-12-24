<?php

/*
【 composer安装使用 】
前提条件：开启PHP中openssl扩展

【 使用composer方式部署laravel项目 】
1. 配置composer镜像：
$ composer config -g repo.packagist composer https://packagist.phpcomposer.com

2. composer创建一个名为laravel的laravel项目
$ composer create-project laravel/laravel --prefer-dist ./
命令解释：
composer：表示执行composer程序；
create-project：通过composer去创建项目；
laravel/Laravel：需要创建的项目名称；
--prefer-dist：优先下载压缩包方式，而不是直接从github上下载源码（克隆）；
./：表示创建的项目目录名称，也可以是一个目录名；



*/
