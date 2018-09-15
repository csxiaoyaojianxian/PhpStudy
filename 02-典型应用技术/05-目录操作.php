<?php

/*
目录操作
*/

// 【 创建目录 】mkdir(目录地址和名称, 权限, 是否支持递归创建);
mkdir('./test');
mkdir('./test2', 777);
mkdir('./test/test3', 777, true); // 默认为false，不支持递归创建

// 【 删除目录 】
rmdir('./test'); // 不支持递归删除，只能删除空目录

// 修改/移动目录 rename(oldname, newname)
rename('./test', './test4');

// 【 目录遍历 】
// 1, 打开目录，得到一个目录的句柄
$path = './';
$dir_handle = opendir($path);
// 2, 开始遍历获取目录下所有的文件名
while(false !== $file = readdir($dir_handle)) {
	if($file == '.' || $file == '..') {
		continue;
	}
	echo $file,'<br />';
}
// 3, 关闭目录句柄
closedir($dir_handle);

// 【 目录遍历2 】 返回索引数组
$path = './';
var_dump(scandir($path)); // 参数是一个路径

// 【 获取当前的工作路径 】
echo getcwd();
echo '<br />';
echo __DIR__;
echo '<hr />';
// 【 更改当前的工作路径 】
chdir('../');

// 【 重置指针 】
$path = './';
$dir_handle = opendir($path);
$file = readdir($dir_handle);
$file = readdir($dir_handle);
$file = readdir($dir_handle);
rewinddir($dir_handle); // 重置资源指针

/**
 *	递归遍历文件
 *	@param string $path 目录地址（路径）
 */
function readDirs($path) {
	$dir_handle = opendir($path); //打开文件句柄
	while(false !== $file = readdir($dir_handle)) {
		if($file == '.' || $file == '..') {
			continue;
		}
		// 输出该文件名
		echo $file,'<br />';
		// 判断当前文件是否又是一个目录
		if(is_dir($path . '/' . $file)) {
			// 递归点,自己调用自己
			readDirs($path . '/' . $file);
		}
	}
}
$path = './';
readDirs($path);

/**
 *	递归遍历文件，展示成树形
 *	@param string $path 目录地址（路径）
 *  @param int $deep = 0 递归调用的深度
 */
function readDirsTree($path,$deep=0) {
	$dir_handle = opendir($path); //打开文件句柄
	while(false !== $file = readdir($dir_handle)) {
		if($file == '.' || $file == '..') {
			continue;
		}
		// 输出该文件名
		echo str_repeat('&nbsp;',$deep*5),$file,'<br />';
		// 判断当前文件是否又是一个目录
		if(is_dir($path . '/' . $file)) {
			// 递归点,自己调用自己
			readDirs($path . '/' . $file,$deep+1);
		}
	}
}
$path = './';
readDirsTree($path);