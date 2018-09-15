<?php
// 【 php模拟get请求 】
// 1. 建立与服务器的连接
$host = "www.csxiaoyao.com";
$port = '80';
$link = fsockopen($host, $port); // resource类型 stream
// 2. 发送请求数据
define('CRLF',"\r\n");
// 请求行
$request_data = 'GET /test/api.php HTTP/1.1' . CRLF;
// 请求头
$request_data .= 'Host:www.csxiaoyao.com' . CRLF;
$request_data .= 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.92 afari/537.36' . CRLF;
$request_data .= 'Connection: close' . CRLF; // keep-alive默认5s
// 空行表示请求头结束
$request_data .= CRLF;
// 请求主体，GET没有请求主体
// 发送
fwrite($link, $request_data);
// 3. 处理响应数据
while(!feof($link)) {
	// 使用fgets读取响应数据  fgets($link,1024)
	echo iconv('utf-8','gbk',fgets($link,1024));
}
// 4. 断开连接
fclose($link);