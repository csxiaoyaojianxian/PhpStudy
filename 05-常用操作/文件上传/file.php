<?php 
	// $_FILE
	// 在php中 能够通过$_FILE 获取上传的文件
	// $_FILES 用法跟 $_GET,$_POST 类似,都是关系型数组
	// #_FILE['key'] 获取对应上传的文件,这里的key对应提交时的name
	// #_FILE['key']['name'] 获取上传的文件名
	// #_FILE['key']['tmp_name'] 获取上传的文件保存的临时目录
	#
	
	// 可以打印 $_FILES的所有信息
    print_r($_FILES);
	
	// 获取 上传的文件信息 关系型数组
	$fileArr = $_FILES['upFile'];

	// 获取 上传的文件的原本名字
	$fileName = $fileArr['name'];

	// 获取 保存在服务器的位置
	$filePath = $fileArr['tmp_name'];

	// 上传的临时文件,一会就会被自动删除,我们需要将其移动到保存的位置
	// 参数1:移动的文件
	// 参数2:目标路径，相对的路径 相对于该php文件，例如叫files的文件夹
	move_uploaded_file($filePath,'files/'.$fileName);

	/*
	PHP设置上传文件大小限制
	修改php.ini

	file_uploads = On   			; 是否允许上传文件 On/Off 默认是On
	upload_max_filesize = 32M       ; 上传文件的最大限制
	post_max_size = 32M             ; 通过Post提交的最多数据
	
	考虑网络传输快慢,这里修改一些参数
	max_execution_time = 30000      ; 脚本最长的执行时间 单位为秒
	max_input_time = 600            ; 接收提交的数据的时间限制 单位为秒
	memory_limit = 1024M            ; 最大的内存消耗

	 */
?>
