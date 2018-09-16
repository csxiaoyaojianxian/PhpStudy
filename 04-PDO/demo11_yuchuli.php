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
    //5、使用execute实现参数的传递
    $password = md5('123456');
    $time = time();
    $data = array(
        ':username'=>'zhangsan',
        ':password'=>$password,
        ':time'=>$time
    );
    $stmt->execute($data);
?>