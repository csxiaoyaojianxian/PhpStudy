# swoole学习笔记

## 1. php7源码安装

步骤：解压、configure、make、make install

## 2. 切换Mac默认PHP版本为MAMP

> 注：在实际学习过程中发现有问题，改为非MAMP的PHP

```
$ sudo vi ~/.bash_profile
export PATH="/Applications/MAMP/bin/php/php5.5.38/bin:$PATH"
$ source ~/.bash_profile
$ which php
```

如果安装了zsh，会出现重新打开terminal窗口时php又跳回自带的PHP，因为terminal在init的时候默认启动执行脚本变为了～/.zshrc，并不会执行~/.bash_profile、~/.bashrc等脚本了，解决方法是修改zsh配置文件：

```
$ vi ~/.zshrc
# 追加
source ~/.bash_profile
```

## 3. swoole

源码安装

```
$ git clone https://github.com/swoole/swoole-src.git
$ phpize
# ./configure --help
# ./configure --with-php-config=/home/work/study/soft/php/bin/php-config
$ ./configure
$ make
$ make install
```

配置php.ini

```
extension=swoole.so
```

验证

```
$ php -m
# 看到swoole即成功
```

## 4. redis

swoole使用异步redis的前置条件

1. 安装redis服务

   ```
   $ tar -zxvf redis-5.0.3.tar.gz
   $ make
   $ make install
   $ cd src
   $ ./redis-server
   # (可选)修改端口等配置
   $ vi redis.conf
   # 使用客户端连接
   $ ./redis-cli
   > set csxiaoyao 1
   > get csxiaoyao
   ```

2. 安装hiredis库，参考swoole官方文档下载安装包

   ```
   $ make && make install
   ```

3. 重新编译swoole，需要加入 --enable-async-redis

   ```
   $ ./configure --with-php-config=/home/work/study/soft/php/bin/php-config --enable-async-redis
   ```

4. 验证

   ```
   $ php --ri swoole
   # 查看是否有 async_redis => enabled
   ```

