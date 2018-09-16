<?php
header("Content-type:text/html;Charset=utf-8");
header("location:http://www.csxiaoyao.com");
header("location:./upload.html"); // URI  不执行后续操作
header("refresh:3;url=http://www.csxiaoyao.com"); // 等待期间继续执行
die("3秒后跳转到其他的页面！");

// 实现下载
// 1. 提示浏览器不要解析文件
header("Content-type:application/octet-stream");
// 2. 指导浏览器如何保存文件
header("Content-disposition:attachment;filename=csxiaoyao.jpg");
// 3. 将数据输出给浏览器
echo file_get_contents('./sunshine.jpg');