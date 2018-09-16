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
    $sql = "update tb_admin set password=md5('admin') where id = 1";
    //4、执行SQL语句
    $num = $pdo->exec($sql);
    echo '共修改了'.$num.'行数据';
?>