<?php
/**
 * @Author: csxiaoyao
 * @Date:   2017-07-12 16:00:04
 * @Last Modified by:   csxiaoyao
 * @Last Modified time: 2017-07-12 21:35:10
 */
header("Content-type: text/html; charset=gb2312");

$action = "select";

/**
 * 数据库连接
 */
$servername = "localhost";
$username = "root";
$password = "19931128";
$dbname = "myDB";
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    echo "connect success <br>"; 

    /**
     * 创建数据库
     */
    if($action == "createdb"){
        // 设置 PDO 错误模式，用于抛出异常
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
        $sql = "CREATE DATABASE myDBPDO"; 
        // 使用 exec() ，因为没有结果返回
        $conn->exec($sql); 
        echo "create database success <br>";
    }

    /**
     * 创建数据表
     */
    if($action == "createtb"){
        $sql = "CREATE TABLE MyGuests (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
            firstname VARCHAR(30) NOT NULL,
            lastname VARCHAR(30) NOT NULL,
            email VARCHAR(50),
            reg_date TIMESTAMP
        )";
        // 使用 exec() ，因为没有结果返回 
        $conn->exec($sql);
        echo "create table success <br>";
    }

    /**
     * 插入数据
     */
    if($action == "insert"){
        $sql = "INSERT INTO MyGuests (firstname, lastname, email)
        VALUES ('John', 'Doe', 'john@example.com')";
        // 使用 exec() ，因为没有结果返回 
        $conn->exec($sql);
        echo "insert success <br>";
    }

}catch(PDOException $e){
    die("Error: " . $e->getMessage() . "<br>");
}

try {
    /**
     * 插入多条数据
     */
    if($action == "multi_insert"){
        // 开始事务
        $conn->beginTransaction();
        // SQL 语句
        $conn->exec("INSERT INTO MyGuests (firstname, lastname, email) 
        VALUES ('John', 'Doe', 'john@example.com')");
        $conn->exec("INSERT INTO MyGuests (firstname, lastname, email) 
        VALUES ('Mary', 'Moe', 'mary@example.com')");
        $conn->exec("INSERT INTO MyGuests (firstname, lastname, email) 
        VALUES ('Julie', 'Dooley', 'julie@example.com')");
        // 提交事务
        $conn->commit();
        echo "insert success <br>";
    }
}catch(PDOException $e){
    // 如果执行失败回滚
    $conn->rollback();
    echo "Error:" . $e->getMessage() . "<br>";
}

try{
    /**
     * 预处理语句
     */
    if($action == "pre"){
        // 预处理 SQL 并绑定参数
        $stmt = $conn->prepare("INSERT INTO MyGuests (firstname, lastname, email) 
        VALUES (:firstname, :lastname, :email)");
        $stmt->bindParam(':firstname', $firstname);
        $stmt->bindParam(':lastname', $lastname);
        $stmt->bindParam(':email', $email);
        $firstname = "John";
        $lastname = "Doe";
        $email = "john@example.com";
        $stmt->execute();
        $firstname = "Mary";
        $lastname = "Moe";
        $email = "mary@example.com";
        $stmt->execute();
        $firstname = "Julie";
        $lastname = "Dooley";
        $email = "julie@example.com";
        $stmt->execute();
        echo "insert success <br>";
    }

    /**
     * SELECT
     */
    if($action == "select"){
        $stmt = $conn->prepare("SELECT id, firstname, lastname FROM MyGuests"); 
        $stmt->execute();
        // 设置结果集为关联数组
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
        foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) { 
            echo $v;
        }
    }

}catch(PDOException $e){
    echo "Error:" . $e->getMessage() . "<br>";
}

/**
 * 数据库关闭
 */
$conn = null;
