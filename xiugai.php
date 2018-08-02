<?php
//header("Content-type:text/html;charset=utf-8");
include('connect.php');
$ID = $_GET['ID'];
//echo $ID;
$sql = "SELECT * FROM msg  where id=$ID";
//echo $sql;
$mysqli_result = $conn->query($sql);
$row = $mysqli_result->fetch_array( MYSQL_ASSOC );
//echo $ID; //显示获取的ID
//var_dump( $row );
//echo $row["name"];
//echo $row["content"];
//echo $row['name'];
//var_dump( $mysqli_result );

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8"/>
		<title>修改</title>

	</head>
	<body>
		<div class='xiu'>
			<!-- 修改留言 -->
			<div class='xiugai'>
			<form action="xiugai1.php" method="post">
				<textarea name='content' class='content' cols='50' rows='5' ><?php echo $row["content"];?></textarea>
				<input name='user' class='user' type='text' value="<?php echo $row["name"];?>"/>
				<input name='ID' class='ID' type='text' value="<?php echo $row["ID"];?>"/>
				<input class='btn' type='submit' value='修改留言'/>
			</form>
			</div>
		</div>
	</body>
</html>