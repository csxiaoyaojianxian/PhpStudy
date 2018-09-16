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
    $sql = "insert into tb_admin values (null,?,?,?)";
    //4、定义预处理语句
    $stmt = $pdo->prepare($sql);
    //5、使用execute传递参数
    $password = md5('123456');
    $time = time();
    $data = array(
        0=>'lisi',
        1=>$password,
        2=>$time
    );
    $stmt->execute($data);
?>