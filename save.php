<?php

include('input.php');
include('connect.php');

$content = $_POST['content'];
$user = $_POST['user'];


$input = new input();


//调用函数，检查留言内容
$is = $input->post( $content );
if( $is == false ){
	die('留言内容的数据不正确');
}

//调用函数，检查留言人
$is = $input->post( $user );
if( $is == false ){
	die('留言人的数据不正确');
}
//var_dump( $content, $user );

//第九天，将数据入库
$time = time();
//echo $time;
//$sql = "INSERT INTO msg (content, name, time) values ('{$content}', '{$user}','{$time}')";
$sql = "INSERT INTO msg (content, name,time) values ('{$content}', '{$user}','{$time}')";
$is = $conn->query($sql);
//var_dump( $is );
header("location: gbook.php");
?>