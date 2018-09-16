<?php
    //1、设置响应头信息
    header('Content-type:text/html; charset=utf-8');
    //2、实例化pdo类
    $dbms = 'mysql';
    $user = 'root';
    $pass = 'mysql';
    $dbname = 'project';
    $dsn = "$dbms:host=localhost; dbname=$dbname";

    //设置长连接
    $data = array(PDO::ATTR_PERSISTENT=>true);
    $pdo = new PDO($dsn, $user, $pass, $data);
    //3、设置常用属性
    $pdo->setAttribute(PDO::ATTR_AUTOCOMMIT,0); //关闭自动提交
    $pdo->setAttribute(PDO::ATTR_CASE,PDO::CASE_LOWER); //结果集字段全部转化为小写

    //4、获取常用属性值
    echo '自动提交：';
    var_dump($pdo->getAttribute(PDO::ATTR_AUTOCOMMIT));
    echo '<hr />';

    echo '结果集大小写：';
    var_dump($pdo->getAttribute(PDO::ATTR_CASE));
    echo '<hr />';

    echo '长连接：';
    var_dump($pdo->getAttribute(PDO::ATTR_PERSISTENT));
    echo '<hr />';
?>