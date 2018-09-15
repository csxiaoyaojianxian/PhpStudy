<meta http-equiv="content-type" content="text/html;charset=utf-8">
<?php

//实例：输出1-100之间所有的偶数，用continue实现
for($i=1;$i<=100;$i++)
{
	//如果是奇数，则开始下次循环
	if($i%2!=0)
	{
		continue; //剩下的代码不再执行
	}
	echo "$i "; // 2 4 
}

$i = 0;
while(++$i)
{
	switch($i)
	{
		case 5:
			echo "第{$i}次循环<br>";
			break 1;
		case 10:
			echo "第{$i}次循环<br>";
			break 2;
	}
}
echo $i;


//实例：求数组中元素的和
$arr = array(
	10=>5,
	14=>6,
	8=>10
);
$sum = 0;
foreach($arr as $value)
{
	$sum += $value;
}
echo "和为$sum";
?>
