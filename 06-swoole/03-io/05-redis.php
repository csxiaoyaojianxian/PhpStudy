<?php
/**
 * 异步redis
 */
/*
【 swoole使用异步redis的前置条件 】
1. 安装redis服务
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
2. 安装hiredis库，参考swoole官方文档下载安装包
    $ make && make install
3. 重新编译swoole，需要加入 --enable-async-redis
    $ ./configure --with-php-config=/home/work/study/soft/php/bin/php-config --enable-async-redis
4. 验证
    $ php --ri swoole
    # 查看是否有 async_redis => enabled
*/

$redisClient = new swoole_redis; // Swoole\Redis
$redisClient->connect('127.0.0.1', 6379, function(swoole_redis $redisClient, $result) {
    echo "connect".PHP_EOL;
    var_dump($result); // bool(true)

    // 同步 redis  (new Redis())->set('key',1);
    // 异步 redis
    $redisClient->set('csxiaoyao', time(), function(swoole_redis $redisClient, $result) {
        var_dump($result); // string(2) "OK"
    });
    $redisClient->get('csxiaoyao', function(swoole_redis $redisClient, $result) {
        var_dump($result); // string(10) "1550298808"
        $redisClient->close();
    });

    // 获取key列表
    // $redisClient->keys('*'， function(){})
    $redisClient->keys('*cs*', function(swoole_redis $redisClient, $result) {
        var_dump($result);
        $redisClient->close();
    });
});

echo "start".PHP_EOL;