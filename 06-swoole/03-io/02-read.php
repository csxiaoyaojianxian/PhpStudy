<?php
/**
 * Data: 2019.02.14
 */

/**
 * 读取文件
 * __DIR__
 */
$result1 = swoole_async_readfile(__DIR__."/data.txt", function($filename, $fileContent) {
    echo "filename1:".$filename.PHP_EOL; // (3) ... 异步操作
    echo "content1:".$fileContent.PHP_EOL;
});

$result2 = Swoole\Async::readfile(__DIR__."/data.txt", function($filename, $fileContent) {
    echo "filename2:".$filename.PHP_EOL; // (4) ... 异步操作
    echo "content2:".$fileContent.PHP_EOL;
});

var_dump($result1); // (1) bool(true)
echo "start".PHP_EOL; // (2) start   // PHP_EOL \n \r \n 