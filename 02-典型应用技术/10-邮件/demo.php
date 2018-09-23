<?php
require_once('./PHPMailer/class.phpmailer.php');
$mail = new PHPMailer();
//设置为发邮件
$mail->IsSMTP();
//是否允许发送HTML代码做为邮件的内容
$mail->IsHTML(TRUE);
$mail->CharSet='UTF-8';
//启用ssl
$mail->SMTPSecure = "ssl";
//是否需要身份验证
$mail->SMTPAuth=TRUE;
/*  发送邮件的中转服务器账号信息 */
$mail->From="sunjianfeng@csxiaoyao.com"; //发送方账号
$mail->FromName="CS逍遥剑仙";       //发送方名称
$mail->Host="smtp.exmail.qq.com";  //发送方中转邮件服务器地址
$mail->Username="sunjianfeng@csxiaoyao.com";     //账号名称
$mail->Password="";   //账号密码
// 发邮件smtp协议端口号，默认25
$mail->Port = 465;

// 收件人，显示名称(可以多次设置，表示多人同时收取邮件)
$mail->AddAddress('1724338257@qq.com','sunshine');
$mail->AddAddress('634950205@qq.com','cs');

//发送附件
$mail->AddAttachment('./sign.jpg');
// 邮件标题
$mail->Subject='测试邮件';
// 邮件内容
$mail->Body='这是一封测试邮件<a href="http://www.csxiaoyao.com">csxiaoyao</a>';
var_dump($mail->send());
