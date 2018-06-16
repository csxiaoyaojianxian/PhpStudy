<?php
// 常量不能删除，不使用$，区分大小写，尽量全大写，与变量区分

// 【 常量定义 define() 】
// bool define ( string $name , mixed $value [, bool $case_insensitive = false ] )
//     $case_insensitive 是否大小写敏感，false(区分大小写)，true(不区分大小写)

// 【 常量判断 defined() 】
// bool defined ( string $name )
//     常量名必须是字符串
define("ID", "1724338257");
if(defined("ID")){
	echo ID;
}else{
	echo "不存在";
}

// 【 预定义常量 】
// PHP_VERSION：PHP版本号
// PHP_OS：PHP操作系统
// PHP_INT_MAX：PHP支持的最大整数
// TRUE：既是常量，也是关键字
// FALSE：既是常量，也是关键字
// ……

// 【 获取系统中所有常量 get_defined_constants() 】
// PHP的系统常量，大约有800多个，可以通过get_defined_constants()函数来获取
// array get_defined_constants ([ bool $categorize = false ] )
//     bool $categorize参数，是否显示二维数组，是否常量要分组

// 【 魔术常量 】
// 魔术常量：在程序运行过程中，值会变的常量，get_defined_constants()中没有魔术常量
// __LINE__：获取当前行号
// __FILE__：获取当前文件的绝对路径
// __DIR__：获取当前文件的目录
// __FUNCTION__：获取当前函数名
// __CLASS__：获取当前类名
// __METHOD__：获取当方法名
