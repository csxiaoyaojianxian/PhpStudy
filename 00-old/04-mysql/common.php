<?php

//声明PHP输出数据的字符集
header("content-type:text/html;charset=utf-8");
//(0)数据库配置信息
$db_host    = "localhost:3306";
$db_user    = "root";
$db_pwd     = "root";
$db_name    = "sunshine";

//(1)PHP连接MySQL服务器
// @可以屏蔽各种函数调用错误，或包含文件错误，但是不能用在函数定义或类定义之前
$link = @mysql_connect($db_host,$db_user,$db_pwd);
if(!$link)
{
    echo "PHP连接MySQL失败！" . mysql_error();
    exit();
}

//(2)选择当前数据库
// 方法1
mysql_query('use `db_name`');
// 方法2
if(!mysql_select_db($db_name))
{
    echo "选择数据库{$db_name}失败！" . mysql_error();
    exit();
}

//(3)设置MySQL返回的数据字符集
mysql_query("set names utf8");

//(4)执行操作
// resource mysql_query ( string $query [, resource $link = NULL ] )

//(5)结果集处理
// 1. mysql_fetch_row()
// 描述：从结果集中取得一行作为枚举数组。
// 语法：array mysql_fetch_row ( resource $result )
// 参数：$result是结果集变量。
// 返回值：返回一个枚举数组，也就是从0开始的正整数下标。这里的下标，是与表的字段下标是对应。
// 举例：$arr = mysql_fetch_row($result)

// 2. mysql_fetch_array()
// 描述：从结果集中取出一行，作为混合数组返回。
// 语法：array mysql_fetch_array ( resource $result [, int $ result_type ] )
// 参数：
//     $result：是指结果集变量。
//     $result_type：是指返回的数组的类型。取值：MYSQL_BOTH、MYSQL_ASSOC、MYSQL_NUM
//     MYSQL_BOTH：默认的。也就是两种下标都存在。
//     MYSQL_ASSOC：只有字符下标的数组。相当于mysql_fetch_assoc()的功能。
//     MYSQL_NUM：只有整数下标的数组。相当于mysql_fetch_row()的功能。
//     以上三个参数是常量，系统常量必须全大写。
// 返回值：返回一个数组，至于是什么数组，取决于第二个参数。
// 举例：
//     $arr = mysql_fetch_array($result)  //混合数组
//     $arr = mysql_fetch_array($result , MYSQL_ASSOC )  //关联数组
//     $arr = mysql_fetch_array($result , MYSQL_NUM)   //枚举数组

// 3. mysql_fetch_assoc()
//     描述：从结果集中取一行，以关联数组返回。
//     语法：array mysql_fetch_assoc(resource $result)
//     举例：$arr = mysql_fetch_assoc($result)

// 4. mysql_num_rows();
// 描述：获取结果集中的记录条数。
// 语法：int mysql_num_rows ( resource $result )
// 说明：此命令仅对 SELECT 语句有效


//(6)退出md
exit("退出连接");