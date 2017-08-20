<?php
	$servername = "localhost";
	$dbusername = "root";
	$dbpassword = "wangling";
	$dbname = "injection";
	$id=$_GET['id'];//id未经过滤
	$conn=mysqli_connect($servername,$dbusername,$dbpassword) or die ("数据库连接失败");
	mysqli_select_db($dbname,$conn);
	mysqli_query('set names utf8');
	$sql = "SELECT * FROM article WHERE articleid='$id'";
	echo $sql."<br>";
	$result = mysqli_query($sql,$conn);
	$row = mysqli_fetch_array($result);
	echo "<p>利用SQL注入漏洞拖库<p>";
	if (!$row){
		echo "该记录不存在";
		exit;
	}
	echo "标题<br>".$row['title']."<p>";
	echo "内容<br>".$row['content']."<p>";
?>