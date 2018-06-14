<?php
/**
 * @Author: sunshine
 * @Date:   2018-06-01 11:32:35
 * @Last Modified by:   sunshine
 * @Last Modified time: 2018-06-02 10:17:41
 */


header('content-type:text/html;charset=utf-8');

// 常量前不用 $
// 类（接口）中可以放属性、方法、常量
class Student {
	const type='学生';
	public function show() {
		// 等同于 Student::type
		return self::type;
	}
}

interface IPict {
	const type='人类';
}

$stu = new Student;
echo $stu->show();
echo Ipict::type;
