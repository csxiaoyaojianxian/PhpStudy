<?php
    // 公共控制器


    // 命名空间
    namespace Core;

    class Contorller {
        // 公共方法
        public function success($msg, $url, $time = 1) {
            // 跳转提示
            header("Refresh:{$time};url='index.php?{$url}'");
            echo $msg;
            // 终止脚本
            exit();
        }
        public function error($msg, $url, $time = 3) {
            // 跳转提示
            header("Refresh:{$time};url='index.php?{$url}'");
            echo $msg;
            // 终止脚本
            exit();
        }
    }
