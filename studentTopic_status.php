<!-- 学生模块 显示我的选题情况 -->
<html>
<head>
	<meta charset="UTF-8">
	<title>Document</title>
  <link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.min.css">
  <thnk rel="stylesheet" type="text/css" href="http://www.sucaihuo.com/jquery/css/common.css" />
	<style>
table{
       float: left;
        background-color: #7fbdf0;
        line-height: 25px;
        width:100%;
        font-size: 15px;
        }
th{
      background-color: #fff2fb;
      text-align: center;
        }
td{
     background-color: #fff2fb;text-align: center;
 }
	</style>
</head>
<body>
<h2 class="page-header" style="font-size:20px;text-align:center">我的选题情况</h2>
<?php
    require ('conn.php');
    session_start();
    $username=$_SESSION['username'];
    $sql="select topic_id,topic_name,teacher_id,teacher_name,class,topic_type,will,status from topics_stu where username='$username'";
    $result=mysqli_query($conn,$sql);
    if ($sql&&mysqli_num_rows($result)) {
        echo '<table class="table table-hover table-bordered">';
        echo '<tr class="success mx-0">
      <th>课题编号</th>
      <th>课题名称</th>
      <th>教师编号</th>
      <th>教师姓名</th>
      <th>课题专业</th>
      <th>课题类型</th>
      <th>所选志愿</th>
      <th>审核状态</th>
      </tr>';
      while($row = mysqli_fetch_assoc($result)){
            echo '<tr class="active">';
            foreach($row as $col){
                echo '<td>'.$col.'</td>';
            }
            echo '</tr>';
}           echo '</table>';

    }else{
       echo '<div style="color:red" align="center">很抱歉，暂时没有你的选题信息</div>';
    }
   

  ?>
</body>
</html>
