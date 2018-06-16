<?php

/**
 * 【 数组的分类 】
 */
// 枚举数组：下标为从0开始的正整数，如：$arr = array(10,20,30)
// 关联数组：下标为字符串，如：$arr = array('name'=>'张三' , 'sex'=> '男');
// 混合数组：下标既有字符串也有整型，如：$arr = array(10,20,’name’=>’Mary’)
// 多维数组：数组元素还是数组，如：$arr = array(array(10,20))

/**
 * 【 数组的创建 】
 */
// (1) 使用[]来创建数组
// 数组不存在，则创建新数组，再添加下标为0的元素
// 数组已存在，则添加新元素，下标为最大整数下标+1
// 也可手动指定下标，可以是字符串，也可以是整型
$arr[] = 10;
$arr[10] = 100;
$arr['a'] = 'b';
$arr[] = 'c';
var_dump($arr);
/*
array(4) {
 [0]=>int(10)
 [10]=>int(100)
 ["a"]=>string(1) "b"
 [11]=>string(1) "c"
}
 */

// (2) 使用array()函数来创建数组
// "=>" 称为重载下标，重新指定下标
$arr = array(1,2,'a',true);
$arr = array(
	'name' => 'csxiaoyao',
	10     => 100,
	20     => 'victorsun',
	'sunshine',
	'csxiaoyao'
);
var_dump($arr);
/*
array(5) {
 ["name"]=>string(9) "csxiaoyao"
 [10]=>int(100)
 [20]=>string(9) "victorsun"
 [21]=>string(8) "sunshine"
 [22]=>string(9) "csxiaoyao"
}
 */

/**
 * 【 多维数组 】
 */
$arr = array(
	array(1,'csxiaoyao1',25),
	array(2,'csxiaoyao2',26),
	array(3,'csxiaoyao3',27),
);
for($i = 0; $i < count($arr); $i++){
	for($j = 0; $j < count($arr[$i]); $j++){
		echo $arr[$i][$j];
	}
}

/**
 * 【 数组操作函数 】
 */
// count()
// 计算数组中的单元数目或对象中的属性个数
// int count ( mixed $var [, int $mode = COUNT_NORMAL ] )
//     $mode可选，是否统计多维数组元素个数。1为统计多维，0只统计当前维数

// unset()
// 释放给定的变量
// void unset ( mixed $var [, mixed $... ] )
//     可以删除一个数组元素，也可以删除整个数组

/**
 * 【 数组指针的函数 】
 */
// current()：返回当前数组指针处元素的值，不移动指针
// key()：返回当前数组指针处元素的下标，不移动指针
// next()：返回下一个数组元素的值，并将指针下移一行
// prev()：返回上一个数组元素的值，并将指针回退一步
// end()：返回最后一个数组元素的值，并将指针移到数组最后一个元素
// reset()：返回第一个数组元素的值，并将指针移到第一个元素上

// 使用for和next()遍历关联数组
$arr = array(
	"name" => "csxiaoyao",
	"age"  => 25,
	"score"=> 100
);
for($i = 0; $i < count($arr); $i++){
	echo key($arr), current($arr);
	next($arr);
}

/**
 * 【 foreach 循环 】
 */

foreach ($arr as $value) {
	echo $value;
}
foreach ($arr as $key=>$value) {
	echo $key, $value;
}

