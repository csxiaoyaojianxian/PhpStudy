<?php
/**
 * 进程
 */

// swoole父进程 -> 创建swoole子进程 -> 子进程包含 1.管理进程（含worker进程）2.

// 创建子进程
$process = new swoole_process(function(swoole_process $pro) {
    $pro->exec("/usr/bin/php", [__DIR__.'/../01-server/03-http_server.php']);
}, false); // 第二个参数如果为true，子进程的输出不打印到屏幕，而是输出到管道(管道是进程和进程通信的桥梁)

// 子进程id
$pid = $process->start();
echo $pid . PHP_EOL; // 通过 $ ps aux | grep process.php 查看父进程

// 回收子进程
swoole_process::wait();
