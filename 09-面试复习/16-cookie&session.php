<?php
/**
 * cookie
 */
// 读取
// $_COOKIE
// 存储
// setcookie($name, $value, $expire, $path, $domain, $secure);
// 存储数组
// setcookie('a[b]', 'val');
// 删除
// setcookie($name, '', time() - 1000);

/**
 * session
 */
session_start();
// 读取
$_SESSION;
// session删除
$_SESSION = [];
$_SESSION = NULL;
session_destroy();

// session.auto_start
// session.cookie_domain
// session.cookie_lifetime
// session.cookie_path
// session.name
// session.save_path
// session.use_cookies
// session.use_trans_sid

/**
 * session 垃圾回收
 * 每100次调用 session_start 进行1次清理时间超过1440s的sessoon
 */
// session.gc_probablity = 1
// session.gc_divisor = 100
// session.gc_maxlifetime = 1440

/**
 * session id 传递问题
 */
/* 
<a href="1.php?<?php echo session_name(). '='. session_id() ?>">下个页面</a>
<a href="1.php?<?php echo SIDSID; ?>">下个页面</a>
*/

/**
 * session 存储问题
 */
// session_set_save_handler() // mysql/redis...
