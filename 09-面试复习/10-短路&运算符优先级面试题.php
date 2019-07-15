<?php

$a = 0;
$b = 0;

// $a = ((3 > 0) || $b = 3 > 0) 
// ||短路，后面不执行
// $a = true; $b = 0;
if ($a = 3 > 0 || $b = 3 > 0) 
{
    $a++;
    $b++;
    var_dump($a); // true
    var_dump($b); // 1
}

