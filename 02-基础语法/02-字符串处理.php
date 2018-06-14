<meta http-equiv="content-type" content="text/html;charset=utf-8">
<?php

/*
字符串的表示方法有三种：
（1）用单引号(不解析)
单引号内的转义字符，只能是：\\、\’
（2）用双引号(解析)
双引号内，所有的转义字符都能使用。如：\\、\’、\”、\$、\n、\r、\t
（3）长字符串的表示方法

在双引号内，输出是变量的值。如：echo “{$name}的年龄是24岁”
在单引号内，输出的是变量的名称，而不是值。
在双引号内，如果一个变量名后跟一个非空字符，则会让编译器糊涂。这种情况解决方案是：后面可以跟一个空格字符，也可以跟英文下的标点符号，这些都会解析变量的。
可以使用大括号，将变量包起来，也能解析变量的。
*/

//用双引号表示字符串，双引号内的转义字符都可以用
$name = "csxiaoyao";
$sex = "男";
$age = 24;
$str = "<h2>\"{$name}\"的基本信息如下</h2>";
$str .= "\n姓名：$name";
$str .= "\n<br>性别：$sex";
$str .= "\n<br>年龄：$age";
echo $str;

/*
长字符串表示，必须放在“<<<heredoc”和 “heredoc;”之间。
“<<<heredoc”必须是开头的标记。
“heredoc;”必须是结束的标记。必须是单独一行，并且顶头写。
heredoc可以自定义名称。
可以直接解析PHP变量。
*/
//长字符串表示方法
$name = "csxiaoyao";
$edu = "USTC";
$str = <<<EOT
<h1 style="background-color:yellow;">中越联合公报：早日达成南海行为准则</h1>
<p onMouseOver="pOver(this)" onMouseOut="pOut(this)">应中国共产党中央委员会总书记、中华人民共和国主席习近平的邀请，越南共产党中央委员会总书记阮富仲于2015年4月7日至10日对中华人民共和国进行正式访问。访问期间，中共中央总书记、国家主席习近平与阮富仲总书记举行会谈。中共中央政治局常委、国务院总理李克强，中共中央政治局常委、全国人大常委会委员长张德江。</p>
<div>{$name}的毕业院校：{$edu} {10+20}</div>
<script type="text/javascript">
function pOver(pObj)
{
	pObj.style.backgroundColor = "yellow";
}
function pOut(pObj)
{
	pObj.style.backgroundColor = "";
}
</script>
EOT;
echo $str;

?>