<?php
header("Content-type:text/html;charset=utf-8");
include('connect.php');

$ID = $_GET['ID'];
//echo $ID; //��ʾ��ȡ��ID
//var_dump( $ID );
$sql = "delete from msg where id=$ID";  //ɾ����SQL���
$is = $conn->query($sql);
//var_dump( $is );//��ʾִ��֮��Ľ��
if($is){
	echo "<script>alert('success');location.href='gbook.php';</script>";

}
else{
	echo "<script>alert('fail');history.back();</script>";
	
}
//header("location: gbook.php");//���ز�ˢ��
?>