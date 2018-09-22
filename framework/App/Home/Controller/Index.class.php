<?php
    // 前台控制器

    // 命名空间
    namespace \Home\Controller;

    // 引入空间元素
    use \Core\Controller;

    class Index extends Controller {

        // 测试方法
        public function index(){
            echo "hello world！";

            // 调用模型
            $m = new \Model\User();
            $user = $m->getUser();

            // 调用视图
            include_once APP_DIR . PLAT . '/View/user.html';
        }
    }