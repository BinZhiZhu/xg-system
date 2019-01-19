<!-- 数据库连接 -->
<?php
header('Content-Type:text/html;charset=utf8');
$conn=mysqli_connect("localhost","root","root","xg_system");
if (!$conn)
  {
  die('Could not connect: ' . mysql_error());
  }

?>