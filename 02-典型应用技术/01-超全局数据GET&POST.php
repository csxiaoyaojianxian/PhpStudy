<?php

/**
 * @Author: sunshine
 * @Date:   2018-09-15 15:01:07
 * @Last Modified by:   sunshine
 * @Last Modified time: 2018-09-15 15:20:04
 */
/*
1. 接收get和post时,需要使用empty函数进行判断
2. 表单默认GET提交 , 默认提交给当前文件
3. POST相比GET允许上传二进制数据，数据大小原则上无限制(浏览器限制8M)
4. 如果POST和GET冲突，$_REQUEST由于默认先GET后POST，POST会覆盖GET，默认为POST的值，可以通过设置php.ini中的 request_order = "PG" 修改顺序
5. checkbox正常传值，name要设置为数组，例如：<input type="checkbox" name="hobby[]" value="xxx">
6. $_REQUEST = $_GET + $_POST + $_COOKIE


*/