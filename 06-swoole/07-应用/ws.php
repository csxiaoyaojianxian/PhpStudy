<?php
/**
 * ws server 可以包含 http server
 * 本案例在 onRequest 中启动thinkphp框架
 * 实现了 ws server 处理 get、post 请求
 */
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
}
new Ws();