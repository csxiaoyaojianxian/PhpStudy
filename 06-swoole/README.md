# swoole学习笔记

[TOC]

> Write By CS逍遥剑仙  
> 我的主页: [www.csxiaoyao.com](http://www.csxiaoyao.com/)  
> GitHub: [github.com/csxiaoyaojianxian](https://github.com/csxiaoyaojianxian)  
> Email: sunjianfeng@csxiaoyao.com  
> QQ: [1724338257](https://www.csxiaoyao.cn/blog/index.php/2018/09/18/02-2/wpa.qq.com/msgrd?uin=1724338257&site=qq&menu=yes) 

swoole是面向生产环境的 PHP 异步网络通信引擎，本笔记是本人在学习完慕课网的课程《Swoole入门到实战打造高性能赛事直播平台》后的笔记，是对学习的代码整理的补充，学习过程中整理的github代码地址：

[https://github.com/csxiaoyaojianxian/PhpStudy/tree/master/06-swoole](https://github.com/csxiaoyaojianxian/PhpStudy/tree/master/06-swoole)

## 1. php7源码安装

步骤：解压、configure、make、make install，此处略。

## 2. 切换Mac默认PHP版本为MAMP

> 注：在实际学习过程中发现有问题，改为非MAMP的PHP

```
$ sudo vi ~/.bash_profile
export PATH="/Applications/MAMP/bin/php/php5.5.38/bin:$PATH"
$ source ~/.bash_profile
$ which php
```

如果安装了zsh，会出现重新打开terminal窗口时php又跳回自带的PHP，因为terminal在init的时候默认启动执行脚本变为了～/.zshrc，并不会执行~/.bash_profile、~/.bashrc等脚本了，解决方法是修改zsh配置文件：

```
$ vi ~/.zshrc
# 追加
source ~/.bash_profile
```

## 3. swoole安装

源码安装

```
$ git clone https://github.com/swoole/swoole-src.git
$ phpize
# ./configure --help
# ./configure --with-php-config=/home/work/study/soft/php/bin/php-config
$ ./configure
$ make
$ make install
```

配置php.ini

```
extension=swoole.so
```

验证

```
$ php -m
# 看到swoole即成功
```

## 4. redis安装

swoole使用异步redis的前置条件

1. 安装redis服务

```
$ tar -zxvf redis-5.0.3.tar.gz
$ make
$ make install
$ cd src
$ ./redis-server
# (可选)修改端口等配置
$ vi redis.conf
# 使用客户端连接
$ ./redis-cli
> set csxiaoyao 1
> get csxiaoyao
```

2. 安装hiredis库，参考swoole官方文档下载安装包

```
$ make && make install
```

3. 重新编译swoole，需要加入 --enable-async-redis

```
$ ./configure --with-php-config=/home/work/study/soft/php/bin/php-config --enable-async-redis
```

4. 验证

```
$ php --ri swoole
# 查看是否有 async_redis => enabled
```

5. 封装redis类

关注 `public function __call($name, $arguments)` 方法

```
<?php
   namespace app\common\lib\redis;
   class Predis {
       public $redis = "";
       // 定义单例模式变量
       private static $_instance = null;
       public static function getInstance() {
           if(empty(self::$_instance)) {
               self::$_instance = new self();
           }
           return self::$_instance;
       }
       private function __construct() {
           $this->redis = new \Redis();
           $result = $this->redis->connect(config('redis.host'), config('redis.port'), config('redis.timeOut'));
           if($result === false) {
               throw new \Exception('redis connect error');
           }
       }
       /**
        * set
        * @return bool|string
        */
       public function set($key, $value, $time = 0 ) {
           if(!$key) {
               return '';
           }
           if(is_array($value)) {
               $value = json_encode($value);
           }
           if(!$time) {
               return $this->redis->set($key, $value);
           }
           return $this->redis->setex($key, $time, $value);
       }
       /**
        * get
        * @return bool|string
        */
       public function get($key) {
           if(!$key) {
               return '';
           }
           return $this->redis->get($key);
       }
       /**
        * 返回key中所有成员
        * @return array
        */
       public function sMembers($key) {
           return $this->redis->sMembers($key);
       }
       // 调用前面不存在的方法，如 sAdd()
       public function __call($name, $arguments) {
           //echo $name.PHP_EOL;
           //print_r($arguments);
           if(count($arguments) != 2) {
               return '';
           }
           $this->redis->$name($arguments[0], $arguments[1]);
       }
   }
```


## 5. thinkphp框架整合swoole

ws server 可以包含 http server，本案例在 onRequest 中启动thinkphp框架，实现了 ws server 处理 get、post 请求

### 5.1 使用swoole构建包含http server的websocket服务

详见demo的`/script/server/ws.php`

```
<?php
class Ws {
    CONST HOST = "0.0.0.0"; // 监听的ip
    CONST PORT = 8811; // 第一个port，用于直播
    CONST CHART_PORT = 8812; // 第二个port，用于聊天室
    public $ws = null;
    public function __construct() {
        $this->ws = new swoole_websocket_server(self::HOST, self::PORT);
        $this->ws->listen(self::HOST, self::CHART_PORT, SWOOLE_SOCK_TCP);
        $this->ws->set(
            [
                'enable_static_handler' => true,
                'document_root' => "/home/work/hdtocs/public/static",
                'worker_num' => 4,
                'task_worker_num' => 4,
            ]
        );
        $this->ws->on("start", [$this, 'onStart']);
        $this->ws->on("open", [$this, 'onOpen']); // ws
        $this->ws->on("message", [$this, 'onMessage']); // ws
        $this->ws->on("workerstart", [$this, 'onWorkerStart']);
        $this->ws->on("request", [$this, 'onRequest']); // request
        $this->ws->on("task", [$this, 'onTask']); // task
        $this->ws->on("finish", [$this, 'onFinish']); // task
        $this->ws->on("close", [$this, 'onClose']);
        $this->ws->start();
    }
    ...
}
new Ws();
```

### 5.2 onStart & onWorkerStart 指定进程名并加载框架 

onStart 中指定进程名称，应用于reload.sh的服务重启脚本，重启脚本见后面小节。

onWorkerStart 加载thinkphp框架，用于处理请求。

```
public function onStart($server) {
    // 指定进程名称，应用于reload.sh的服务重启脚本
    swoole_set_process_name("live_master");
}
public function onWorkerStart($server,  $worker_id) {
    // 定义应用目录
    define('APP_PATH', __DIR__ . '/../application/');
    // 加载框架文件
    require __DIR__ . '/../thinkphp/start.php';
}
```

### 5.3 onRequest 处理 http 请求 

onRequest 用于处理http请求，包含过滤请求、处理`$_SERVER`、`$_GET`、`$_FILES`、`$_POST`并写入日志，最后调用thinkphp框架处理请求。日志落盘方法见后面小节。

```
public function onRequest($request, $response) {
    // 请求过滤，/favicon.ico如果不存在则直接返回404
    if($request->server['request_uri'] == '/favicon.ico') {
        $response->status(404);
        $response->end();
        return;
    }
    // 兼容php的 $_SERVER、$_GET、$_FILES、$_POST
    $_SERVER  =  [];
    if(isset($request->server)) {
        foreach($request->server as $k => $v) {
            $_SERVER[strtoupper($k)] = $v;
        }
    }
    if(isset($request->header)) {
        foreach($request->header as $k => $v) {
            $_SERVER[strtoupper($k)] = $v;
        }
    }
    $_GET = [];
    if(isset($request->get)) {
        foreach($request->get as $k => $v) {
            $_GET[$k] = $v;
        }
    }
    $_FILES = [];
    if(isset($request->files)) {
        foreach($request->files as $k => $v) {
            $_FILES[$k] = $v;
        }
    }
    $_POST = [];
    if(isset($request->post)) {
        foreach($request->post as $k => $v) {
            $_POST[$k] = $v;
        }
    }
    // 请求写入日志
    $this->writeLog();
    // http_server 不需要写入日志
    $_POST['http_server'] = $this->ws;
    ob_start(); // php打开缓冲区, 控制浏览器cache
    // 执行应用并响应
    try {
        think\Container::get('app', [APP_PATH])->run()->send();
    }catch (\Exception $e) {}
    $res = ob_get_contents(); // 获取缓冲区输出
    ob_end_clean(); // 清空cache
    $response->end($res);
}
```

### 5.4 onTask & onFinish 处理 task 

onTask中可以处理task请求，例如task发送验证码。

```
public function onTask($serv, $taskId, $workerId, $data) {
    $obj = new app\common\lib\ali\Sms();
    try {
        $response = $obj::sendSms($data['phone'], $data['code']);
    }catch (\Exception $e) {
        echo $e->getMessage();
    }
}
```

task的异步机制能够提高处理效率，随着task类型的增加，将处理事件直接写在ws.php中不利于维护，利用php的动态函数名进行task分发，将具体task内容封装为Task类，用方法进行区分，使代码结构更加清晰。

```
/**
 * task
 * $serv: swoole server对象
 * $data: 调用task时候传入的参数
 */
public function onTask($serv, $taskId, $workerId, $data) {
    // 分发 task 任务机制，类似于不同的 controller
    $obj = new app\common\lib\task\Task;
    $method = $data['method']; // 执行的函数名
    $flag = $obj->$method($data['data'], $serv);
    return $flag; // 通知worker处理结果
}
// task完成
public function onFinish($serv, $taskId, $data) {
    echo "taskId:{$taskId}\n";
    echo "finish-data-sucess:{$data}\n";
}
```

task的调用，在controller中调用`$_POST['http_server']->task`，server对象在上一步存入到了POST中，`$_POST['http_server'] = $this->ws;`

```
$taskData = [
    'method' => 'sendSms',
    'data' => [
        'phone' => $phoneNum,
        'code' => rand(1000, 9999)
    ]
];
$_POST['http_server']->task($taskData);
```

### 5.5 onOpen & onMessage & onClose 处理ws客户端连接 

onOpen中向redis的指定key的集合存储ws客户端。

onMessage处理ws消息。

onClose在连接断开时清除redis集合中的ws客户端。

```
// 监听ws连接事件
public function onOpen($ws, $request) {
    // 调用封装的redis类Predis向redis集合中存入连接的客户端信息 fd
    \app\common\lib\redis\Predis::getInstance()->sAdd(config('redis.live_game_key'), $request->fd);
    var_dump($request->fd);
}
// 监听ws消息事件
public function onMessage($ws, $frame) {
    echo "ser-push-message:{$frame->data}\n";
    $ws->push($frame->fd, "server-push:".date("Y-m-d H:i:s"));
}
public function onClose($ws, $fd) {
    // fd del
    \app\common\lib\redis\Predis::getInstance()->sRem(config('redis.live_game_key'), $fd);
    echo "clientid:{$fd}\n";
}
```

## 6. 日志落盘

在前面的http请求中，对于每个请求，需要调用`$this->writeLog();`记录日志，使用swoole的异步文件写入来记录日志。

```
// swoole异步记录日志
public function writeLog() {
    $datas = array_merge(['date' => date("Ymd H:i:s")],$_GET, $_POST, $_SERVER);
    $logs = "";
    foreach($datas as $key => $value) {
        $logs .= $key . ":" . $value . " ";
    }
    swoole_async_writefile(APP_PATH.'../runtime/log/'.date("Ym")."/".date("d")."_access.log", $logs.PHP_EOL, function($filename){
        // todo
    }, FILE_APPEND);
}
```

## 7. 服务平滑重启

利用`kill -USR1 $pid`可以平滑重启服务，不影响处理请求，其中`$pid`为onStart中`swoole_set_process_name("live_master")`指定的进程名称，脚本`reload.sh`如下。

```
echo "loading..."
pid=`pidof live_master`
echo $pid
kill -USR1 $pid
echo "loading success"
```

## 8. 服务监控

### 8.1 监控shell脚本

在项目下建立 `monitor/server.php` 监控程序对ws http 8811服务进行监控。首先分析监控的shell脚本。

```
$ netstat -anp | grep 8811
```

得到的结果大致为

```
(Not all processes could be identified, non-owned process info
 will not be shown, you would have to be root to see it all.)
 xxx
 xxx
 xxx
```

使用 `grep LISTEN` 在得到的多条结果中过滤掉其他非目标结果，使用`wc -l`返回得到的结果行数。

```
$ netstat -anp | grep 8811 | grep LISTEN | wc -l
```

此时的正常返回结果为：

```
(Not all processes could be identified, non-owned process info
 will not be shown, you would have to be root to see it all.)
1
```

使用`2>/dev/null`将前两行提示输出到null，只留下结果行数。

```
$ netstat -anp 2>/dev/null | grep 8811 | grep LISTEN | wc -l
```

最终的正常结果为：

```
1
```

### 8.2 使用swoole定时器执行shell脚本

linux的定时任务crontab的精度为分钟，用来进行实时监控太长，需要利用swoole的定时器来调用shell脚本监控，定时器每两秒执行一次。

```
class Server {
    const PORT = 8811;
    public function port() {
        $shell = "netstat -anp 2>/dev/null | grep ". self::PORT . " | grep LISTEN | wc -l";
		// php 执行 shell 脚本
        $result = shell_exec($shell);
        if($result != 1) { // 返回的结果行数不为1
            // todo 告警服务 邮件 短信 ...
            echo date("Ymd H:i:s")."error".PHP_EOL;
        } else {
            echo date("Ymd H:i:s")."succss".PHP_EOL;
        }
    }
}
// nohup
swoole_timer_tick(2000, function($timer_id) {
    (new Server())->port(); // 执行
    echo "time-start".PHP_EOL;
});
```

### 8.3 启动监控服务

后台执行监控服务，每两秒输出结果到demo.log文件。

```
$ nohub /xxx/php /xxx/ws.php > /xxx/demo.log &
```

查看监控服务是否正常启动。

```
$ ps aux | grep monitor/server.php
```

查看监控日志文件。

```
$ tail -f demo.log
```

## 9. 附录1: websocket使用task群发消息的实现

task任务的实现。

```
<?php
namespace app\common\lib\task;
use app\common\lib\redis\Predis;
class Task {
    /**
     * 通过task机制发送赛况实时数据给客户端
     * @param $data
     * @param $serv swoole server对象
     */
    public function pushLive($data, $serv) {
        $clients = Predis::getInstance()->sMembers(config("redis.live_game_key"));
        foreach($clients as $fd) {
            $serv->push($fd, json_encode($data));
        }
    }
}
```

controller中调用task 任务

```
$taskData = [
	'method' => 'pushLive',
	'data' => $data
];
$_POST['http_server']->task($taskData);
```

![](https://raw.githubusercontent.com/csxiaoyaojianxian/ImageHosting/master/img/sign.jpg)