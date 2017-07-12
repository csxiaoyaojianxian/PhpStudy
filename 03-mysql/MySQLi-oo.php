<?php
/**
 * @Author: victorsun
 * @Date:   2017-07-12 16:00:04
 * @Last Modified by:   victorsun
 * @Last Modified time: 2017-07-12 21:32:52
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

// 创建连接
// $conn = new mysqli($servername, $username, $password);
$conn = new mysqli($servername, $username, $password, $dbname);
// 检测连接(新版本)
if ($conn->connect_error) {
    die("connect failed: " . $conn->connect_error . "<br>");
}
// 检测连接(老版本)
if (mysqli_connect_error()) {
    die("connect failed: " . mysqli_connect_error() . "<br>");
}
echo "connect success <br>";

/**
 * 创建数据库
 */
if($action == "createdb"){
    $sql = "CREATE DATABASE myDB";
    if ($conn->query($sql) === TRUE) {
        echo "create database success <br>";
    } else {
        echo "create database failed: " . $conn->error . "<br>";
    }
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
    if ($conn->query($sql) === TRUE) {
        echo "create table success <br>";
    } else {
        echo "create table failed: " . $conn->error . "<br>";
    }
}

/**
 * 插入数据
 */
if($action == "insert"){
    $sql = "INSERT INTO MyGuests (firstname, lastname, email) VALUES ('John', 'Doe', 'john@example.com')";
    if ($conn->query($sql) === TRUE) {
        echo "insert success <br>";
    } else {
        echo "insert failed: " . $conn->error . "<br>";
    }
}

/**
 * 插入多条数据
 */
if($action == "multi_insert"){
    $sql = "INSERT INTO MyGuests (firstname, lastname, email) VALUES ('John', 'Doe', 'john@example.com');";
    $sql .= "INSERT INTO MyGuests (firstname, lastname, email) VALUES ('Mary', 'Moe', 'mary@example.com');";
    $sql .= "INSERT INTO MyGuests (firstname, lastname, email) VALUES ('Julie', 'Dooley', 'julie@example.com')";
    if ($conn->multi_query($sql) === TRUE) {
        echo "insert success <br>";
    } else {
        echo "insert failed: " . $conn->error . "<br>";
    }
}

/**
 * MySQLi 预处理语句
 */
if($action == "pre"){
    // 预处理及绑定
    $stmt = $conn->prepare("INSERT INTO MyGuests (firstname, lastname, email) VALUES (?, ?, ?)");
    // bind_param参数为数据类型，可以降低 SQL 注入的风险
        // i - integer（整型）
        // d - double（双精度浮点型）
        // s - string（字符串）
        // b - BLOB（binary large object:二进制大对象）
    $stmt->bind_param("sss", $firstname, $lastname, $email);
    // 设置参数并执行
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
    $stmt->close();
}

/**
 * SELECT
 */
if($action == "select"){
    $sql = "SELECT id, firstname, lastname FROM MyGuests";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // 输出数据
        while($row = $result->fetch_assoc()) {
            echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
        }
    } else {
        echo "0 结果";
    }
}

/**
 * 数据库关闭
 */
$conn->close();
