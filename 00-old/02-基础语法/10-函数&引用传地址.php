<meta http-equiv="content-type" content="text/html;charset=utf-8">
<?php

//实例：在函数中，给数组添加一个元素
$arr = array("csxiaoyao","男",24);
$school = "USTC";
function addElement(&$arr2,$school2)
{
	$arr2[] = $school2;
}
//调用函数
addElement($arr,$school);
//输出结果
var_dump($arr);

?>