<?php
/**
 * @Author: sunshine
 * @Date:   2018-06-01 11:32:35
 * @Last Modified by:   sunshine
 * @Last Modified time: 2018-06-02 17:03:18
 */

class DB1 {}
class DB2 {}
class DB3 {}
function getInstance($db_name) {
	// 通过数组来保存类的单例
	static $array = array();
	if(!isset($array[$db_name])) {
		$array[$db_name]=new $db_name; // 可变变量
	}
	return $array[$db_name];
}
$db1 = getInstance('DB1');
$db2 = getInstance('DB2');
$db3 = getInstance('DB3');
$db4 = getInstance('DB3');
var_dump($db1,$db2,$db3,$db4);
// object(DB1)#1 (0) { } object(DB2)#2 (0) { } object(DB3)#3 (0) { } object(DB3)#3 (0) { }
