<?php
    //1、设置响应头信息
    header('Content-type:text/html; charset=utf-8');
    //2、实例化pdo类
    $dbms = 'mysql';
    $user = 'root';
    $pass = 'mysql';
    $dbname = 'project';
    $dsn = "$dbms:host=localhost; dbname=$dbname";
    $pdo = new PDO($dsn, $user, $pass);
    //3、开启事务处理
    $pdo->beginTransaction();
    //4、定义交易流程（两个步骤：扣钱与加钱）
    $flag = true;
    $sql = "update tb_bank set money = 2000 where id = 1";
    $affected_rows = $pdo->exec($sql);
    if(!$affected_rows) {
        $flag = false;
    }
    $sql = "update tb_bank set money = 0.1 where id = 3";
    $affected_rows = $pdo->exec($sql);
    if(!$affected_rows) {
        $flag = false;
    }
    //5、判断交易是否成功
    if($flag) {
        //交易成功，提交事务
        $pdo->commit();
    } else {
        //交易失败，回滚事务
        $pdo->rollback();
    }
?>