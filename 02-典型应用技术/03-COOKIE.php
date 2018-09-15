<?php

// 单站点cookie最多4K，20个

// 输出cookie
var_dump($_COOKIE);

// 设置cookie
setCookie('username','csxiaoyao');

// 删除cookie
setCookie('username','');
setCookie('username','',time() - 1); 

// 设置cookie有效期
setCookie('username','sunshine',0); // 默认有效期为一个会话周期
setCookie('username','sunshine',time() + 120); //有效期为两分钟
setCookie('username','sunshine',PHP_INT_MAX); // 永久有效

// 设置cookie有效路径，cookie在当前目录和子目录有效
setCookie('username','sunshine',0,''); // ''为默认值，【默认当前路径和子目录有效】
setCookie('username','sunshine',0,'/'); // /表示整站有效
setCookie('username','sunshine',0,'/page/');

// 设置cookie子域
setCookie('username','sunshine',0,'/',''); // ''为默认值，默认不跨子域
setCookie('username','sunshine',0,'/','csxiaoyao.com');
setCookie('username','sunshine',0,'/','blog.csxiaoyao.com'); 

// 开启cookie仅安全传输
setCookie('username','sunshine',0,'/','csxiaoyao.com', true); // 默认false，支持非ssl的http协议

// http only
setCookie('username','sunshine',0,'/','csxiaoyao.com', false, true);

// cookie数组，实际存的是字符串
setCookie('user[name]','sunshine');
setCookie('user[age]','26');

?>

<script type="text/javascript">
	alert(document.cookie);
</script>