<?php

/**
 * fopen()
 * r/r+、w/w+、a/a+、x/x+、b、t
 * 
 * fwrite()
 * fputs()
 * 
 * fread()
 * fgets() // 行
 * fgetc() // 字符
 * 
 * fclose()
 */

/**
 * 不需要fopen的方式
 * file_get_contents()
 * file_put_contents()
 */

/**
 * file()      读取整个文件到一个数组
 * readfile()  读取文件并输出到缓冲区
 */

/**
 * 访问远程文件
 * 开启 allow_url_fopen
 * HTTP协议连接只读，FTP协议只读或只写
 */

/**
 * 名称相关
 *   basename() dirname() pathinfo()
 * 目录读取
 *   opendir() readdir() closedir() rewinddir()
 * 目录删除(先确保删除文件)
 *   rmdir()
 * 目录创建
 *   mkdir()
 * 文件大小(目录大小只能循环遍历累加)
 *   filesize()
 * 磁盘大小
 *   disk_free_space() disk_total_space()
 * 文件拷贝
 *   copy()
 * 删除文件
 *   unlink()
 * 文件类型(文件/目录)
 *   filetype()
 * 重命名文件或目录(含移动)
 *   rename()
 * 文件截取
 *   ftruncate()
 * 文件属性
 *   file_exists() is_readable() is_writable() is_excutable() filectime() fileatime() filemtime()
 * 文件锁
 *   flock()
 * 文件指针
 *   ftell() fseek() rewind()
 */
