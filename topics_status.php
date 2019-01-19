<!-- 教师模块 查看我申请成功的课题 -->
<?php 
require 'include/common.func.php';
 checklogin();
 ?>
<html>
<head>
	<meta charset="UTF-8">
	<title>课题查看</title>
  <link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.min.css">
  <thnk rel="stylesheet" type="text/css" href="http://www.sucaihuo.com/jquery/css/common.css" />
</head>
<body>
<h2 class="page-header" style="font-size:20px;text-align:center">课题审核情况</h2>
<table class="table table-hover table-bordered">
<tr class="success mx-0">
 <th>序号</th>
 <th>课题编号</th>
 <th>课题名称</th>
 <th>教师编号</th>
 <th>教师姓名</th>
 <th>课题专业</th>
 <th>课题类型</th>
 <th>允许人数</th>
 <th>审核状态</th>
 </tr>
<?php
 require_once 'conn.php';
 $username=$_SESSION['username'];
 $sql=mysqli_query($conn,"select id,topic_id,topic_name,teacher_id,teacher_name,class,topic_type,total_stu,status from topics where teacher_id='$username'");
 while ($row=mysqli_fetch_assoc($sql)) {
 	echo '<tr class="active">';
 	foreach ($row as $col) {
 		echo '<td>'.$col.'</td>';
 	}

 	echo '</tr>';
 }
?>
</table>
</body>
</html>