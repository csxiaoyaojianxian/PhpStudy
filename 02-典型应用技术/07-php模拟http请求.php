<?php

$host = "www.csxiaoyao.com";
$port = '80';
define('CRLF',"\r\n");

// 【 php模拟get请求 】
// 1. 建立与服务器的连接
$link = fsockopen($host, $port); // resource类型 stream
// 2. 发送请求数据
// 请求行
$request_data = 'GET /test/api.php HTTP/1.1' . CRLF;
// 请求头
$request_data .= 'Host:www.csxiaoyao.com' . CRLF;
$request_data .= 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.92 afari/537.36' . CRLF;
$request_data .= 'Connection: keep-alive' . CRLF; // keep-alive默认5s
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

// 【 php模拟post请求 】
// 1. 建立与服务器的连接
$link = fsockopen($host, $port);
// 2. 发送请求数据
// 请求行
$request_data = 'POST /model/validate.php HTTP/1.1' . CRLF;
// 请求头
$request_data .= 'Host:www.csxiaoyao.com' . CRLF;
$request_data .= 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_13_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/69.0.3497.92 afari/537.36' . CRLF;
$request_data .= 'Connection: close' . CRLF;
// 以下是post方式提交的时候特殊的两个请求头
$post_data = array('username'=>'csxiaoyao','password'=>'19931128');
$post_content = http_build_query($post_data); // 字符串 'username=csxiaoyao&password=19931128'
$request_data .= 'Content-Length:' . strlen($post_content) . CRLF;
$request_data .= 'Content-Type:application/x-www-form-urlencoded' . CRLF;
// 空行表示请求头结束
$request_data .= CRLF;
// 请求主体，POST有请求主体
$request_data .= $post_content; // 主体结束不需要CRLF
// 发送
fwrite($link, $request_data);
// 3, 处理响应数据
while(!feof($link)) {
	echo iconv('utf-8','gbk',fgets($link,1024));
}
// 4, 断开连接
fclose($link);
