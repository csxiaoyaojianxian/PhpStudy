<?php
header("content-type:text/html;charset=utf-8")
// 单行注释
# 单行注释
/* 
  多
  行
  注
  释
 */
?>
<meta http-equiv="content-type" content="text/html;charset=utf-8">
此处会被执行
<!--<?php echo date("Y-m-d")?>-->

1、PHP语言区分大小写：$NAME、$name
2、PHP中的关键字和函数名不区分大小写，如：break、continue、for、while
3、语句结束符
  PHP的每一行代码，都必须以英文分号(;)结束
  如果只有一行PHP代码，可以省略分号
  多行PHP语句代码，最后一行的分号可以省略
  各种PHP的语法结构不加分号。如：for、if、switch、while、foreach等