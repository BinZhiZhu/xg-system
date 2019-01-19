<!-- 教师模块 查看申请未通过的课题 -->
<html>
<head>
	<meta charset="UTF-8">
	<title>课题查看</title>
    <link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.min.css">
  <thnk rel="stylesheet" type="text/css" href="http://www.sucaihuo.com/jquery/css/common.css" />
</head>
<body>
<h2 class="page-header" style="font-size:20px;text-align:center">审核未通过课题</h2>
<?php
 require_once 'conn.php';
 session_start();
 $username=$_SESSION['username'];
 $sql=mysqli_query($conn,"select id,topic_id,topic_name,teacher_id,teacher_name,class,total_stu,status from topics where teacher_id='$username' and status='不通过'");
  if ($sql &&mysqli_num_rows($sql)) { 
   ?>
<table class="table table-hover table-bordered">
<tr class="success mx-0">
      <th>序号</th>
      <th>课题编号</th>
      <th>课题名称</th>
      <th>教师编号</th>
      <th>教师姓名</th>
      <th>课题专业</th>
      <th>允许人数</th>
      <th>审核状态</th>
      <th>操作</th>
      </tr>
   <?php
 while ($row=mysqli_fetch_assoc($sql)) {
 	echo '<tr class="active">';
 	foreach ($row as $col) {
 		echo '<td>'.$col.'</td>';
 	}
  echo "<td><a href='action_topic.php?action=del_topics&id={$row['id']}'>删除</a></td>";

 	echo '</tr>';
 }
}else{
    echo '<div style="color:red" align="center">暂时没有审核不通过的课题</div>';
}
?>
</table>
</body>
</html>