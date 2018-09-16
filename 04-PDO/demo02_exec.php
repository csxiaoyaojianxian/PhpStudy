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
    $time = time();
    $sql = "insert into tb_admin values (null,'test',md5('123456'),$time)";
    //4、使用exec方法执行SQL语句
    $num = $pdo->exec($sql);
    echo '共插入'.$num.'行数据';
    echo '<hr />';
    echo '最后一条插入的数据id为'.$pdo->lastInsertId();
?>