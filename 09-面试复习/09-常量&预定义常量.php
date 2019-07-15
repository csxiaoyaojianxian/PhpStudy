<?php
// 定义
// const 快于 define

// 预定义常量
var_dump(__FILE__); // 当前文件含路径名
var_dump(__DIR__); // 当前路径名
var_dump(__LINE__); // 当前行号，int(7)
function demo () {
    var_dump(__FUNCTION__); // 当前函数名, demo
}
demo();
var_dump(__CLASS__);
var_dump(__TRAIT__);
var_dump(__METHOD__);
var_dump(__NAMESPACE__);