<?php

ini_set('log_errors', 'On');
// 将错误信息输出到一个文本文件 !注意权限问题
ini_set('error_log', dirname(__FILE__) . '/error_log.txt');

// error_log(message,type,destination,headers);
// 参数1: message   必需，规定要记录的错误消息
// 参数2: type	    可选，规定错误应该发送到何处
//      0 - 默认，消息被发送到 PHP 的系统日志，使用操作系统的日志机制或者一个文件，取决于 php.ini 中 error_log 指令
//      1 - 消息被发送到参数 destination 设置的邮件地址。第四个参数 extra_headers 只有在这个类型里才会被用到
//      2 - 不再使用（仅用在 PHP 3 中）
//      3 - 消息被发送到位置为 destination 的文件里，字符 message 不会默认被当做新的一行
//      4 - 消息被直接发送到 SAPI 日志处理程序中
// 参数3: destination	可选，规定错误消息的目标，该值由 type 参数的值决定
// 参数4: headers	可选，仅当 message_type 设置为 1 的时候使用，规定额外的头，比如 From、Cc 和 Bcc，该信息类型使用了 mail() 的同一个内置函数，应当使用 CRLF (\r\n) 来分隔多个头

error_log("默认type为0");
error_log("发送邮件", 1, "admin@example.com");