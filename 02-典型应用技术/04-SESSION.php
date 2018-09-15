<?php

/*
单站点 session大小无限制

SESSION 开启

【方法1】 php.ini
session.auto_start = 0 // 默认关闭
session.auto_start = 1 // 自动开启

【方法2】 session_start();

 */

// 添加
$_SESSION['name'] = 'csxiaoyao';

// 删除
unset($_SESSION['name']);

// 清空
// unset($_SESSION); // error
$_SESSION = array();

// 销毁
session_destroy();

// 修改
$_SESSION['name'] = 'sunshine';

// 查询
var_dump($_SESSION);

// 【 设置session参数 】参数的顺序与cookie相同
// 1. 默认有效期一个会话周期
// 2. cookie默认当前路径和子目录有效，而session默认整站有效
// 3. 有效域默认不跨子域 
// 4. 是否仅安全传输，默认否
// 5. 是否 http only，这个属性没有意义，因为session数据存在服务器，不传给浏览器

// 需要在session_start前设置
// 因为浏览器的 cookie 中存的 session id 默认一个会话周期，导致session的有效期也为一个会话周期
// 与cookie不同，第一个参数时间是基于当前时间time() ，不用 + time()
session_set_cookie_params(600, '/', 'csxiaoyao.com')




session_start();