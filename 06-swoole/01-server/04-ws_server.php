<?php
/**
 * websocket服务
 * 注意：访问前端页面需要启动http_server访问
 * http://127.0.0.1:8888/ws_client.html
 */

$server = new swoole_websocket_server("0.0.0.0", 8812);

// 使支持直接访问 http://127.0.0.1:8812/ws_client.html
/*
$server->set(
    [
        'enable_static_handler' => true,
        'document_root' => __DIR__,
    ]
);
*/
// 监听websocket连接打开事件
$server->on('open', 'onOpen');
function onOpen($server, $request) {
    print_r($request->fd);
}

// 监听ws消息事件
$server->on('message', function (swoole_websocket_server $server, $frame) {
    echo "receive from {$frame->fd}:{$frame->data},opcode:{$frame->opcode},fin:{$frame->finish}\n";
    $server->push($frame->fd, "ws-message");
});

$server->on('close', function ($ser, $fd) {
    echo "client {$fd} closed\n";
});

$server->start();