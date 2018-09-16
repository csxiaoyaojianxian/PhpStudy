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
    $count = $stmt->rowCount();
    //5、使用bindColumn实现列绑定
    $stmt->bindColumn(1,$id);  //把变量$id绑定到结果集中的第1列
    $stmt->bindColumn(2,$username);  //把变量$username绑定到结果集中的第2列
    $stmt->bindColumn(3,$password);  //把变量$password绑定到结果集中的第3列
    //6、使用for循环实现对结果集的遍历
    for($i=0;$i<$count;$i++) {
        //指定fetch的绑定方式为PDO::FETCH_BOUND,否则bindColumn不会生效
        $stmt->fetch(PDO::FETCH_BOUND);
        //输出$id/$username以及$password的基本信息
        echo $id;
        echo '-';
        echo $username;
        echo '-';
        echo $password;
        echo '<hr />';
    }
?>