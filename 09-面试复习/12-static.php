<?php

$count = 5;
function get_count()
{
    static $count;  
    return $count++;
}

echo $count; // 5
echo ++$count; // 6

echo get_count(); // NULL （实际不输出）
echo get_count(); // 1
