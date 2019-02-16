<?php
/**
 * swoole 内存
 * Lock / Buffer / Table / Atomic / mmap / channel / serialize
 */
// 创建内存表
$table = new swoole_table(1024);

// 内存表增加一列
$table->column('id', $table::TYPE_INT, 4);
$table->column('name', $table::TYPE_STRING, 64);
$table->column('age', $table::TYPE_INT, 3);

// 执行创建指定规模的内存表
$table->create();

// create
$table->set('csxiaoyao1', ['id' => 1, 'name'=> 'csxiaoyao1', 'age' => 20]);
// 另一种方案
$table['csxiaoyao2'] = [
    'id' => 2,
    'name' => 'csxiaoyao2',
    'age' => 30,
];

// incr / decr
$table->decr('csxiaoyao1', 'age', 2); // -2

// query
print_r($table['csxiaoyao1']);

// del
$table->del('csxiaoyao1');
