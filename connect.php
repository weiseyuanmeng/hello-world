<?php
header("Content-type:text/html;charset=utf-8");
$servername = "localhost";
$username = "root";
$password = "123456";
$dbname = "price";
 
// 创建连接
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("连接失败: " . mysqli_connect_error());
}
/*else{
	echo "success";
}*/

//设定数据库数据传输的编码
$conn->query("SET NAMES UTF8");