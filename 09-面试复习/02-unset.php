<?php

// unset 只会取消引用，不会销毁空间
$a = 1;

$b = &$a;

unset($b);

echo $a. "\n"; // 不会释放共享空间
