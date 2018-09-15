<?php

/**
 * @Author: sunshine
 * @Date:   2018-09-15 15:41:56
 * @Last Modified by:   sunshine
 * @Last Modified time: 2018-09-15 17:16:28
 */
/*
【步骤1】: 确保服务器开启文件上传
【步骤2】: 浏览器上传
<form method="POST" action="./xxx.php" enctype="multipart/form-data">
	<input type="file" name="image">
</form>
浏览器表单的两种数据类型：
1. 字符串，字符流编码
2. 文件，二进制字节流
服务器接收两种类型表单数据：
1. 字符串，$_POST，内存中
2. 文件，临时目录
【步骤3】: $_FILES二维数组获取文件信息
header("Content-type:text/html;Charset=utf-8");
var_dump($_FILES);
【步骤4】: 验证文件
php.ini中的上传限制
upload_max_filesize = 2M  // 上传文件大小限制
max_file_uploads = 20  // 上传文件数量
max_execution_time = 30  // 单脚本最大执行时间
memory_limit = 128M  // 单脚本最大占用内存
post_max_size = 8M  // 表单域大小限制

$_FILE['xxx']['error'] 错误类型：
0 没有错误
1 超出服务器允许的上传最大值 php.ini 中 upload_max_filesize
2 超出HTML表单中的MAX_FILE_SIZE，目前浏览器不支持
3 文件只有部分被上传
4 用户没有选择文件
6 找不到临时文件夹
7 文件写入失败

【步骤5】: 移动文件，从临时目录到指定目录

*/

header("Content-type:text/html;Charset=utf-8");
var_dump($_FILES);

// step4
switch($_FILES['xxx']['error']){
	case 1: die('超出大小限制');
	case 2: die('超出浏览器表单大小限制');
	case 3: die('文件上传不完整');
	case 4: die('没有选择文件');
	case 6: 
	case 7: die('服务器繁忙');
}

if($_FILES['xxx']['size'] > 1024 * 1024 ) { // 超出1M
	die('超出大小限制');
}

$allow = array('image/jpeg','image/jpg','image/png','image/gif');
if(!in_array($_FILES['xxx']['type'], $allow)) { // 超出1M
	die('类型不允许');
}

// step5
$target = './uploads/' . $_FILES['xxx']['name'];
$result = move_uploaded_file($_FILES['xxx']['tmp_name'], $target);
if($result) {
	echo '上传成功！';
} else {
	echo '上传失败！';
}


/**
 * 文件上传
 * @param array $file
 * @param array $allow
 * @param string & $error 引用传递，记录错误信息
 * @param string $path 上传目录
 * @param int $maxsize = 1024*1024
 * @return mixed false | $newname
 */
function upload($file, $allow, & $error, $path, $maxsize=1048576) {
	// ...
}