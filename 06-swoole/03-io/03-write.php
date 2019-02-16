<?php
/**
 * write
 */

$content = date("Ymd H:i:s").PHP_EOL;
swoole_async_writefile(__DIR__."/data.log", $content, function($filename){
    // todo
    echo "success".PHP_EOL; // (2)
}, FILE_APPEND);  // FILE_APPEND追加，类似file_put_contents()

echo "start".PHP_EOL; // (1)

// 异步写日志文件见httpserver