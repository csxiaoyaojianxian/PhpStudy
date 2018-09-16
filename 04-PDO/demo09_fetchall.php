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
    //5、把数据表中的所有记录返回到一个二维数组中
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //6、遍历结果集
    foreach($data as $row) {
        echo $row['id'];
        echo '-';
        echo $row['username'];
        echo '-';
        echo $row['password'];
        echo '<hr />';
    }
?>