<?php
    //1、设置响应头信息
    header('Content-type:text/html; charset=utf-8');
    //2、实例化pdo类
    $pdo = new PDO('mysql:host=localhost;dbname=project','root','mysql');
    var_dump($pdo);

 	// 增删改：$pdo->exec($sql) 返回受影响的行数
	// 查询：$pdo->query($sql) 返回PDOStatement类，fetch方法、fetchAll方法、fetchColumn方法
?>