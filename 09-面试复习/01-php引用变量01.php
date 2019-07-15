<?php

// 定义一个变量
$a = range(0, 1000); // 创建一个 0-1000 的数组
var_dump(memory_get_usage()); // int(391360)
// zval变量容器，需要安装xdebug插件
xdebug_debug_zval('a'); // refcount=1, is_ref=0

// 定义变量b，将a变量的值赋值给b
// COW Copy On Write
$b = $a;
var_dump(memory_get_usage()); // int(391392)
xdebug_debug_zval('a'); // refcount=2, is_ref=0

// 对a进行修改，才分配空间
$a = range(0, 1000);
var_dump(memory_get_usage()); // int(428312)
xdebug_debug_zval('a'); // refcount=1, is_ref=0
