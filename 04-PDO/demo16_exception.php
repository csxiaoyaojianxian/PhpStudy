<?php
    //1、设置响应头信息
    header('Content-type:text/html; charset=utf-8');
    //2、定义相关参数
    $dbms = 'mysql';
    $user = 'root';
    $pass = 'mysql';
    $dsn = "$dbms:host=localhost;dbname=project";
    //3、实例化pdo类
    try {
        $pdo = new PDO($dsn,$user,$pass);
        //4、定义SQL语句
        $time = time();
        $sql = "insert into tb_admin values (null,abcd,'123456',$time)";
        $flag = $pdo->exec($sql);
        //5、手工抛出异常
        if($flag === false) {
            throw new PDOException('SQL语句错误',1000);
        }
    } catch(PDOException $e) {
        echo '错误号：'.$e->getCode().'<hr />';
        echo '错误行：'.$e->getLine().'<hr />';
        echo '错误信息：'.$e->getMessage();
    }
?>