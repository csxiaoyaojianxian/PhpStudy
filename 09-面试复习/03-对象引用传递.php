<?php

// 对象本身就是引用传递
class Person
{
    public $name = "zhangsan";
}

$p1 = new Person;
xdebug_debug_zval('p1'); // refcount=1, is_ref=0

$p2 = $p1;
xdebug_debug_zval('p1'); // refcount=2, is_ref=0

$p2->name = "lisi";
xdebug_debug_zval('p1'); // refcount=2, is_ref=0
