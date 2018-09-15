<?php
/**
 * @Author: sunshine
 * @Date:   2018-06-01 11:32:35
 * @Last Modified by:   sunshine
 * @Last Modified time: 2018-06-03 00:47:55
 */

header('content-type:text/html;charset=utf-8');
// 传递不同的参数，调用不同的策略（方法）
interface IStrategy {
	function ontheway();
}
class Walk implements IStrategy {
	public function ontheway() {
		echo '走着去<br>';
	}
}
class Bick implements IStrategy {
	public function ontheway() {
		echo '骑自行车去<br>';
	}
}
class Bus implements IStrategy {
	public function ontheway() {
		echo '坐巴士去<br>';
	}	
}
//策略模式，传递不同的参数，调用不同的策略
class Strategy{
	public function getWay(IStrategy $obj) {
		$obj->ontheway();
	}
}
$obj=new Strategy();
$obj->getWay(new Walk);		//走着去
$obj->getWay(new Bick);		//骑自行车去
$obj->getWay(new Bus);		//坐巴士去
