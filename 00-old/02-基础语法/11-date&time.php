<?php
header('content-type:text/html;charset=utf-8');

/**
 * 时区设置
 */
date_default_timezone_set('PRC');
date_default_timezone_set("Asia/Shanghai");

/**
 * date_create()
 */
$date1 = date_create("80-1-15"); // 1980-01-15
$date2 = date_create();
date_date_set($date2,2020,10,15);
echo date_format($date2,"Y-m-d");

/**
 * time()
 */
// 返回自 Unix 纪元（January 1 1970 00:00:00 GMT）以来经过的秒数，非毫秒数
echo time() . "<br>";

/**
 * date(format,timestamp)
 */
// format		必需, 规定时间戳格式
// timestamp	可选, 规定时间戳
echo date("Y-m-d H:i:s l") . "<br>";
echo date("Y-m-d H:i:s l", time()) . "<br>";
echo date("U") . "<br>";

// * U - 自 Unix 纪元（January 1 1970 00:00:00 GMT）以来经过的秒数，非毫秒数
// * Y - 年（四位数）
// * y - 年（两位数）
// * m - 月（01-12）
//	 n - 月（1-12）
//	 F - 月（完整文本表示）
//	 M - 月（三个字母短文本表示）
// * d - 日（01-31）
//	 j - 日（1-31）
//	 S - 日的后缀，搭配j使用（2个字符：st、nd、rd 或 th）
//	 z - 日（0-365）
//	 w - 星期（0-6）0代表星期日
//	 W - 星期（1,2,3...6,0）0代表星期日
//	 N - 星期（1-7）7代表星期日
//	 l - 星期（完整文本表示）
//	 D - 星期（三个字母短文本表示）

//	 t - 给定月份中包含的天数
//	 L - 是否是闰年（如果是闰年则为 1，否则为 0）
//	 o - ISO-8601 标准下的年份数字

// * H - 时（00-23）
//	 G - 时（0-23）
//	 h - 时（01-12）
//	 g - 时（1-12）
// * i - 分（00-59）
// * s - 秒（00-59）
// * u - 微秒

//	 a -（am / pm）
//	 A -（AM / PM）
//	 e - 时区标识符（例如：UTC、GMT、Atlantic/Azores）
//	 T - 时区的简写（实例：EST、MDT）

/**
 * 返回数组
 */
// getdate(timestamp)
print_r(getdate(time()));
// date_parse_from_format(string, format)
print_r(date_parse_from_format("mmddyyyy","05122013"));

/**
 * 返回时间戳
 */
// strtotime(string)  将英文文本日期时间解析为 Unix 时间戳
echo(strtotime("now") . "<br>");
echo(strtotime("15 October 1980") . "<br>");
echo(strtotime("+5 hours") . "<br>");
echo(strtotime("+1 week 3 days 7 hours 5 seconds") . "<br>");
echo(strtotime("next Monday") . "<br>");
echo(strtotime("last Sunday") . "<br>");
// mktime(hour,minute,second,month,day,year,is_dst)
echo "Oct 3, 1975 was on a ".date("l", mktime(0,0,0,10,3,1975)) . "<br>";

/**
 * 时间差
 */
date_add($date2,date_interval_create_from_date_string("100 days"));
echo date_format($date2,"Y-m-d");
$diff = date_diff($date1,$date2);
print_r($diff);