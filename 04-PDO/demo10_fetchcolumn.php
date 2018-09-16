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
    //5、获取总记录数
    $count = $stmt->rowCount();
    //6、使用for循环遍历结果集
    for($i=0;$i<$count;$i++) {
        $id = $stmt->fetchColumn(0);
        echo $id.'<hr />';
    }
?>