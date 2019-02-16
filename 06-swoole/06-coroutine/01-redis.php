<?php
/**
 * 协程
 * coroutine
 * 同步代码实现异步操作
 */

$http = new swoole_http_server('0.0.0.0', 8001);
// http://127.0.0.1:8001/?name=csxiaoyao

$http->on('request', function($request, $response) {
    // 获取redis 里面 的key的内容， 然后输出浏览器
    $redis = new Swoole\Coroutine\Redis();
    $redis->connect('127.0.0.1', 6379);
    $value = $redis->get($request->get['name']);

    $response->header("Content-Type", "text/plain");
    $response->end($value);
});

$http->start();
