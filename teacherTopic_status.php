<!--  教师模块 教师审核课题（被学生选择的课题审核） -->
<html>
<head>
	<meta charset="UTF-8">
	<title>Document</title>
    <link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.min.css">
  <thnk rel="stylesheet" type="text/css" href="http://www.sucaihuo.com/jquery/css/common.css" />
</head>
<body>
<h2 class="page-header" style="font-size:20px;text-align:center">查看课题被选情况</h2>
<?php
    require ('conn.php');
    session_start();
    $username=$_SESSION['username'];
    $sql="select id,topic_id,topic_name,name,username,class,topic_type,will from topics_stu where teacher_id='$username' and status='审核中'";
    $result=mysqli_query($conn,$sql);
    if ($sql &&mysqli_num_rows($result)) { 
       echo '<table class="table table-hover table-bordered">';
        echo '<tr class="success mx-0">
       <th>序号</th>
      <th>课题编号</th>
      <th>课题名称</th>
      <th>学生姓名</th>
      <th>学生学号</th>
      <th>课题专业</th>
      <th>课题类型</th>
      <th>所选志愿</th>
      <th>课题审核</th>
      <th>操作</th>
      </tr>';
         while($row = mysqli_fetch_assoc($result)){
            echo '<tr class="active">';
            foreach($row as $col){
                echo '<td>'.$col.'</td>';
            }
            echo  "<form action='action_topic.php?action=checkTopic_stu&id={$row['id']}' method='post'>";
            echo '<td><select name="status">
            <option value="通过">通过</option>
            <option value="不通过">不通过</option>
            </select></td>';
            echo '<td><input type="submit"/></td>'; 
            echo '</form> '; 
            echo '</tr>';
}     
      echo '</table>';
    }else{
       echo '<div style="color:red" align="center">暂时没有学生选择您的课题</div>';
    }
   


  ?>
</body>
</html>
