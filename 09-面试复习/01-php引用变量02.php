<?php
// 定义一个变量
$a = range(0, 1000);
var_dump(memory_get_usage()); // int(391360)
xdebug_debug_zval('a'); // refcount=1, is_ref=0

// 定义变量b，将a变量的值赋值给b
$b = &$a;
var_dump(memory_get_usage()); // int(391416)
xdebug_debug_zval('a'); // refcount=2, is_ref=1

// 对a进行修改
$a = range(0, 1000);
var_dump(memory_get_usage()); // int(391416)
xdebug_debug_zval('a'); // refcount=2, is_ref=1
