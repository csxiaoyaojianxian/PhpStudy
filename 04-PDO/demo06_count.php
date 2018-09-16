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
    $sql = "select * from tb_admin";
    //4、执行SQL语句
    $stmt = $pdo->query($sql);
    //5、返回数据表中的总记录数
    echo '共有'.$stmt->rowCount().'条记录';
    echo '<hr />';
    //6、返回数据表中的总列数
    echo '共有'.$stmt->columnCount().'列数据';