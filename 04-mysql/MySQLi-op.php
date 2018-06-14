<?php
/**
 * @Author: victorsun
 * @Date:   2017-07-12 16:00:04
 * @Last Modified by:   victorsun
 * @Last Modified time: 2017-07-12 21:34:01
 */
header("Content-type: text/html; charset=gb2312"); 

$action = "";

/**
 * 数据库连接
 */
$servername = "localhost";
$username = "root";
$password = "19931128";
$dbname = "myDB";

// 创建连接
// $conn = mysqli_connect($servername, $username, $password);
$conn = mysqli_connect($servername, $username, $password, $dbname);
// 检测连接
if (!$conn) {
    die("connect failed: " . mysqli_connect_error() . "<br>");
}
echo "connect success <br>";

/**
 * 创建数据库
 */
if($action == "createdb"){
    $sql = "CREATE DATABASE myDB";
    if (mysqli_query($conn, $sql)) {
        echo "create database success <br>";
    } else {
        echo "create database failed: " . mysqli_error($conn) . "<br>";
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
    if (mysqli_query($conn, $sql)) {
        echo "create table success <br>";
    } else {
        echo "create table failed: " . mysqli_error($conn) . "<br>";
    }
}

/**
 * 插入数据
 */
if($action == "insert"){
    $sql = "INSERT INTO MyGuests (firstname, lastname, email) VALUES ('John', 'Doe', 'john@example.com')";
    if (mysqli_query($conn, $sql)) {
        echo "insert success <br>";
    } else {
        echo "insert failed: " . mysqli_error($conn) . "<br>";
    }
}

/**
 * 插入多条数据
 */
// 方法1
if($action == "multi_insert_1"){
    $sql = "INSERT INTO MyGuests (firstname, lastname, email) VALUES ('John', 'Doe', 'john@example.com');";
    $sql .= "INSERT INTO MyGuests (firstname, lastname, email) VALUES ('Mary', 'Moe', 'mary@example.com');";
    $sql .= "INSERT INTO MyGuests (firstname, lastname, email) VALUES ('Julie', 'Dooley', 'julie@example.com')";
    if (mysqli_multi_query($conn, $sql)) {
        echo "insert success <br>";
    } else {
        echo "insert failed: " . mysqli_error($conn) . "<br>";
    }
}
// 方法2
if($action == "multi_insert_2"){
    $sql = "INSERT INTO MyGuests(firstname, lastname, email)  VALUES(?, ?, ?)";
    // 为 mysqli_stmt_prepare() 初始化 statement 对象
    $stmt = mysqli_stmt_init($conn);
    //预处理语句
    if (mysqli_stmt_prepare($stmt, $sql)) {
        // 绑定参数
        // 第二个参数 "sss" 展示了参数类型
            // i - 整数
            // d - 双精度浮点数
            // s - 字符串
            // b - 布尔值
        mysqli_stmt_bind_param($stmt, 'sss', $firstname, $lastname, $email);
        // 设置参数并执行
        $firstname = 'John';
        $lastname = 'Doe';
        $email = 'john@example.com';
        mysqli_stmt_execute($stmt);
        $firstname = 'Mary';
        $lastname = 'Moe';
        $email = 'mary@example.com';
        mysqli_stmt_execute($stmt);
        $firstname = 'Julie';
        $lastname = 'Dooley';
        $email = 'julie@example.com';
        mysqli_stmt_execute($stmt);
    }
}

/**
 * SELECT
 */
if($action == "select"){
    $sql = "SELECT id, firstname, lastname FROM MyGuests";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
        }
    } else {
        echo "0 结果";
    }
}

/**
 * WHERE
 */
if($action == "where"){
    $sql = "SELECT * FROM MyGuests WHERE firstname = 'John' ORDER BY reg_date ASC";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_array($result)){
        echo $row['firstname'] . " " . $row['lastname'] . " " . $row['reg_date'] . "<br>";
    }
}

/**
 * UPDATE
 */
if($action == "update"){
    $sql = "UPDATE MyGuests SET email='test@csxiaoyao.com' WHERE firstname='John' AND lastname='Doe'";
    mysqli_query($conn, $sql);
}

/**
 * DELETE
 */
if($action == "delete"){
    $sql = "DELETE FROM MyGuests WHERE lastname='Doe'";
    mysqli_query($conn, $sql);
}

/**
 * 数据库关闭
 */
mysqli_close($conn);
