<?php
/**
 * 面试题
 */
$var1 = 5;
$var2 = 10;
function foo(&$my_var)
{
    global $var1; // 5
    $var1 += 2; // 7
    $var2 = 4; // 4
    $my_var += 3; // 8
    return $var2;
}
$my_var = 5;
echo foo($my_var). "\n"; // 4
echo $my_var. "\n"; // 8
echo $var1; // 7
echo $var2; // 10
$bar = 'foo';
$my_var = 10;
echo $bar($my_var). "\n"; // 4 foo($my_var)

/**
 * 1. & 别名
 */
$a = 1;
$b = &$a; // $a与$b指向同一内容
$b = 2;
echo $b; //2
echo $a; //2

/**
 * 2. 引用传递
 */
function test (&$var)
{
    $var++;
}
$a = 1;
test($a);
echo $a;  //结果为2

/**
 * 3. 引用返回
 */
// 指向函数中 return 的变量
// 调用时不加 & 和普通函数相同
function &myFunc()
{
    static $b = 10;
    $b++;
    return $b;
}
echo myFunc(); // 11
$c = &myFunc();
$c = 100;
echo myFunc(); // 101
$c = 100;
echo myFunc(); // 101 非102，因为上一行修改了函数中$b的值