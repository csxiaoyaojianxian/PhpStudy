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
    //3、组装SQL语句
    $sql = "insert into tb_admin values (null,:username,:password,:time)";
    //4、定义预处理语句
    $stmt = $pdo->prepare($sql);
    //5、绑定参数
    $stmt->bindParam(':username',$username);
    $stmt->bindParam(':password',$password);
    $stmt->bindParam(':time',$time);
    //6、设置参数
    $username = 'wangwu';
    $password = md5('123456');
    $time = time();
    //7、执行预处理语句
    $stmt->execute();
?>