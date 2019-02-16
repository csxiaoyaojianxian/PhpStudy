<?php
/**
 * http服务
 * 
 * 访问方式1:
 * $ curl http://127.0.0.1:8888?param=1
 * 访问方式2:
 * 浏览器 http://127.0.0.1:8888?param=1
 * 
 */
$http = new swoole_http_server("0.0.0.0", 8888);

$http->set(
    [
        'enable_static_handler' => true,
        'document_root' => __DIR__, // http://127.0.0.1:8888/index.html?param=1
    ]
);
$http->on('request', function($request, $response) {
    //print_r($request->get);

    // 异步写日志文件
    $content = [
        'date:' => date("Ymd H:i:s"),
        'get:' => $request->get,
        'post:' => $request->post,
        'header:' => $request->header,
    ];
    swoole_async_writefile(__DIR__."/access.log", json_encode($content).PHP_EOL, function($filename){
        // todo
    }, FILE_APPEND);

    $response->cookie("name", "csxiaoyao", time() + 1800);
    $response->end("<h1>end～</h1>". json_encode($request->get));
});

$http->start();