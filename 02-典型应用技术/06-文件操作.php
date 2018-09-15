<?php

header("content-type:text/html;charset=utf-8");

// filetype
echo filetype('/temp');
echo filetype('./test.php');

// file_exists   true/false
var_dump(file_exists('/temp'));
var_dump(file_exists('./test.php'));

// is_dir | is_file
var_dump(is_dir('/temp'));
var_dump(is_file('/temp'));

/**
 * PHP5以后的文件操作函数，一次性操作
 * file_get_contents & file_put_contents
 */
echo file_get_contents('./index.html');
file_put_contents('./test.txt', 'I am csxiaoyao!'); // 默认覆盖
file_put_contents('./test.txt', 'I am csxiaoyao!', FILE_APPEND);

/**
 * PHP5以前的文件操作函数
 * 将文件当作资源来操作，使用指针操作
 */
$file = './test.txt'; //文件路径
// 文件打开方式 r读 w写 a追加 x替换且不创建不存在的文件 c
// 指针指向文件开头 r+ w+ a+ x+ c+
$mode = 'r';
// 打开文件，得到一个文件句柄
$file_handle = fopen($file,$mode);
$length = 9; // 一个中文3个字节
// fread，读取长度不超过8192，从头开始读
$content = fread($file_handle, $length); // 3个汉字
// fgets，从指针位置开始读，最多读一行，一般用于读一行，指定一个较大长度，如1024
$content = fgets($file_handle, $length);
// fgetc，一次只能读取一个字节的数据，从指针位置开始读
echo fgetc($file_handle);
echo fgetc($file_handle);
echo fgetc($file_handle); // 读3次，读出一个汉字

$mode = 'a';
$content = "test";
// fwrite  返回写入的字节数
$result = fwrite($file_handle, $content);

// 关闭文件句柄
fclose($file_handle);

/**
 * 其他文件操作函数
 */
$file = './test.txt';
// copy 对应 rename 剪切
copy('./from.txt','./to.txt');
// unlink  删除
unlink($file);
// filemtime  文件最后被修改的时间
echo date('Y-m-d H:i:s',filemtime($file));
// filesize
echo filesize($file);
