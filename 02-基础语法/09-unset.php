<meta http-equiv="content-type" content="text/html;charset=utf-8">
<?php
function dump($arr)
{
	echo "<pre>";
	print_r($arr);
	echo "<pre>";
}
//*******************************************************

//unset()删除数组元素
$arr = array(10,20,30,40);
dump($arr);
//如果删除数组元素，则删除的是数组元素的值，而下标还在。
unset($arr[0],$arr[1],$arr[2],$arr[3]);
$arr[] = 50;
dump($arr);
//删除整个数组：则下标重新开始编排
unset($arr);
$arr[] = 60;
dump($arr);


?>
