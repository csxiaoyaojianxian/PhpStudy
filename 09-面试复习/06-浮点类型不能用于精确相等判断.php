<?php

$a = 0.1;
$b = 0.7;
if ($a + $b == 0.8) {
    var_dump(false); // 执行不到，0.7999
}
