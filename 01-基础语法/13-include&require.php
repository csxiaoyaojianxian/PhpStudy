<?php
/*
include语法结构
	描述：包含并运行指定文件。
	语法：include $filename  或者  include($filename)
	举例：include “include/conn.php”
require语法结构
	描述：包含并运行指定文件。
	语法：require $filename  或者  require($filename)
	举例：require “include/conn.php”
注意：include和require都是包含并运行文件，但是，是有区别的。如果包含的文件不存在，include将报一个警告错误,脚本继续向下运行。而require将报致命错误，脚本将立即终止执行。
*/