<?php
/**
 * 创建多个子进程应用
 */

echo "process-start-time:".date("Ymd H:i:s").PHP_EOL;
$workers = []; // pids
$urls = [
    'http://csxiaoyao.com',
    'http://baidu.com',
    'http://sina.com.cn',
    'http://qq.com',
    'http://baidu.com?search=csxiaoyao',
];

// 单进程串行执行方式
/*
foreach($urls as $url) {
    $content[] = file_get_contents($url);
}
*/

// 循环创建子进程并行执行方式
for($i = 0; $i < count($urls); $i++) {
    // 子进程
    $process = new swoole_process(function(swoole_process $worker) use($i, $urls) {
        // curl
        $content = curlData($urls[$i]);
        // echo $content.PHP_EOL; // 第二个参数为true，此时输出到管道
        $worker->write($content);
    }, true); // true，子进程的输出不打印到屏幕，而是输出到管道(管道是进程和进程通信的桥梁)
    $pid = $process->start();
    $workers[$pid] = $process;
}

// 从管道读取
foreach($workers as $process) {
    echo $process->read();
}

/**
 * 模拟请求URL的内容  1s
 */
function curlData($url) {
    // curl 或 file_get_contents($url)
    sleep(1);
    return $url . " success".PHP_EOL;
}

echo "process-end-time:".date("Ymd H:i:s"); // 最后执行

/*
process-start-time:20190216 07:59:15
http://csxiaoyao.com success
http://baidu.com success
http://sina.com.cn success
http://qq.com success
http://baidu.com?search=csxiaoyao success
process-end-time:20190216 07:59:16
*/