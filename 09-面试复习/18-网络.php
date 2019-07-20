<?php
/*
【 1 五类状态码 】
1xx  接收请求正在处理
2xx  请求正常处理完毕
3xx  重定向  301、302
4xx  客户端错误
5xx  服务器错误

【 2 OSI-7层模型 】

【 3 HTTP请求常见请求/响应头 】
Content-Type                请求实体对应的MIME信息
Accept                      指定客户端接收的类型
Origin                      最初POST请求来源
Cookie                      
Cache-Control               指定请求或响应的缓存机制
User-Agent                  用户信息
Referrer                    上级请求路径，与origin有些不同，不限为POST
X-Forwarded-For             请求端真实ip，代理时获取真实ip
Access-Control-Allow-Origin 用于跨域
Last-Modified               请求资源最后响应时间

【 4 Method 】
GET      获取
POST     创建
PUT      修改
DELETE   删除
HEAD     发送请求后响应只包含HEAD信息
OPTIONS  发送请求后响应资源类型为 * ，一般用于查询服务器功能是否正常
TRACE    请求服务器，回显收到的请求信息，一般用于HTTP请求的测试或诊断

GET / POST 区别
