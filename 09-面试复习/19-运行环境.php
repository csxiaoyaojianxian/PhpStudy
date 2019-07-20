<?php
/*
【 1 PHP + PHP-FPM 】

【 2 CGI 】
CGI：    简单理解为接口协议，忽略后端语言端差异，这里为连接 webserver 和 php 的协议
FastCGI：CGI对于大量请求需要逐一 fork & kill，非常浪费资源，FastCGI可以处理请求后保留进程，处理多个请求
PHP-FPM：php fastcgi process manager，fastcgi的进程管理器，FPM 是 FastCGI 的实现并提供了进程管理的功能，
        进程包括 master 和 worker 进程，master 进程只有一个，负责监听端口，接收来自 web server 的请求，
        worker 进程一般有多个，在 FPM 配置中可以配置数量，每个进程内部嵌入 php 解析器，
        master 监听端口默认9000，通过 nginx 反向代理 9000 端口
 */