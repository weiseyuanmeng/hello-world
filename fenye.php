<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<title>留言信息列表</title>
</head>
<?php
    //显示所有emp表的信息
    //1.连接数据库
    $conn=mysql_connect('localhost','root','123456') or die('连接数据库错误'.mysql_error());
    //2.选择数据库
    mysql_select_db('price');
   //3.选择字符集
    mysql_query('set names utf8');
   //4.发送sql语句并得到结果进行处理
    //4.1分页[分页要发出两个sql语句，一个是获得$rowCount,一个是通过sql的limit获得分页结果。所以我们会获得两个结果集，在命名的时候要记得区分。
分页 （四个值 两个sql语句）。]
    $pageSize=3;//每页显示多少条记录
    $rowCount=0;//共有多少条记录
    $pageNow=1;//希望显示第几页
    $pageCount=0;//一共有多少页 [分页共有这个四个指标，缺一不可。由于$rowCount可以从服务器获得的，所以可以给予初始值为0$pageNow希望显示第几页，这里最好是设置为0；$pageSize是每页显示多少条记录，这里根据网站需求提前制定。.$pageCount=ceil($rowCount/$pageSize）,既然$rowCount可以初始值为0，那么$pageCount当然也就可以设置为0.四个指标，两个0 ，一个1，另一个为网站需求。]
         //4.15根据分页链接来修改$pageNow的值
         if(!empty($_GET['pageNow'])){
            $pageNow=$_GET['pageNow'];
        }[根据分页链接来修改$pageNow的值。]
     $sql='select count(id) from price';
     $res1=mysql_query($sql);
    //4.11取出行数
     if($row=mysql_fetch_row($res1)){
        $rowCount=$row[0];        
    }//[取得$rowCount,，进了我们就知道了$pageCount这两个指标了。]
    //4.12计算共有多少页
     $pageCount=ceil($rowCount/$pageSize);
     $pageStart=($pageNow-1)*$pageSize;
     
     //4.13发送带有分页的sql结果
     $sql="select * from emp limit $pageStart,$pageSize";//[根据$sql语句的limit 后面的两个值（起始值，每页条数），来实现分页。以及求得这两个值。]
     $res2=mysql_query($sql,$conn) or die('无法获取结果集'.mysql_error());
     echo '<table border=1>';[echo "<table border='1px' cellspacing='0px' bordercolor='red' width='600px'>";]"<tr><th>id</th><th>name</th><th>grade</th><th>email</th><th>salary</th><th><a href='#'>删除用户</a></th><th><a href='#'>修改用户</a></th></tr>";    
	 while($row=mysql_fetch_assoc($res2)){
		 echo "<tr><td>{$row['id']}</td><td>{$row['name']}</td><td>{$row['grade']}</td><td>{$row['email']}</td><td>{$row['salary']}</td><td><a href='#'>删除用户</a></td><td><a href='#'>修改用户</a></td></tr>";
	 }
     echo '</table>';
     //4.14打印出页码的超链接
     for($i=1;$i<=$pageCount;$i++){
         echo "<a href='?pageNow=$i'>$i</a> ";//[打印出页码的超链接]
      
     }
     //5.释放资源，关闭连接
     mysql_free_result($res2);
     mysql_close($conn);
?>
</html>