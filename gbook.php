<?php
include('connect.php');
$sql = "SELECT * FROM msg ORDER BY id DESC";
$mysqli_result = $conn->query($sql);
if( $mysqli_result === false ){
	echo "SQL错误";
	exit;
}
//$rows =array();
//var_dump($mysqli_result->fetch_array());
while( $row = $mysqli_result->fetch_array( MYSQL_ASSOC ) ){
	//var_dump($row);
	$rows[] = $row;
	
}
//var_dump($rows);
?>



<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8"/>
		<title>留言本</title>
		<style>
		.wrap{
			width:600px;
			margin:0px auto;
		}
		.add{overflow: hidden;}
		.add .content{
			width:598px;
			margin:0;
			padding:0;
		}
		.add .user{
			float:left;
		}
		.add .btn{
			float:right;
		}

		.msg{margin:20px 0px;background: #ccc;padding:5px;}
		.msg .info{overflow: hidden;}
		.msg .user{float:left;color:blue;}
		.msg .time{float:right;color:#999;}
		.msg .content{width:100%;}
		.msg .del{float:right;}
		</style>
	</head>
	<body>
		<div class='wrap'>
			<!-- 发表留言 -->
			<div class='add'>
			<form action="save.php" method="post">
				<textarea name='content' class='content' cols='50' rows='5'></textarea>
				<input name='user' class='user' type='text' />
				<input class='btn' type='submit' value='发表留言'/>
			</form>
			</div>

			<!-- 查看留言 -->
			<?php
			foreach( $rows as $rw ){
				//var_dump($rw);
			?>
				<!-- 查看留言 -->
				<div class='msg'>
					<div class='info'>
						<span class='user'><?php echo $rw['name'];?></span>
						<span class='time'><?php echo date( "Y-m-d H:i:s", $rw['time'] );?></span>
					</div>
					<div class='content'>
						<?php echo $rw['content'];?>
					</div>
					<div class='del'>
				<form action="dell.php" method="GET">
					<?php
					echo "<a href='dell.php?ID=".$rw['ID']."'>删除</a>";
					//echo $rw['ID'];
					echo "<a href='xiugai.php?ID=".$rw['ID']."'>修改</a>";
					?>
				</form>
			    
					</div>
				</div>
			<?php
			}
			?>
		</div>
	</body>
</html>