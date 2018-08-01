<?php
header("Content-type:text/html;charset=utf-8");
include('connect.php');

$ID = $_GET['ID'];
//echo $ID; //显示获取的ID
//var_dump( $ID );
$sql = "delete from msg where id=$ID";  //删除的SQL语句
$is = $conn->query($sql);
//var_dump( $is );//显示执行之后的结果
if($is){
	echo "<script>alert('success');location.href='gbook.php';</script>";

}
else{
	echo "<script>alert('fail');history.back();</script>";
	
}
//header("location: gbook.php");//返回并刷新
?>