<!-- 学生模块 查看我申请成功的课题 -->
<html>
<head>
	<meta charset="UTF-8">
	<title>课题查看</title>
    <link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.min.css">
  <thnk rel="stylesheet" type="text/css" href="http://www.sucaihuo.com/jquery/css/common.css" />
  <style>
  table{margin-top: -25px;}
  th{text-align:  center;}
  td{text-align:  center;}
   .tishi{color: red;text-align:center;position: relative;top:150px;}
  </style>
</head>
<body>
<h2 class="page-header" style="font-size:20px;text-align:center">我的最终课题</h2>
<?php
    require ('conn.php');
    session_start();
    $username=$_SESSION['username'];
    $sql="select * from topics_stu where username='$username' and status='通过'";
    $result=mysqli_query($conn,$sql);
    $num=mysqli_num_rows($result);
    if ($num>0) {
      ?>
     <table class="table table-hover table-bordered">
<tr class="success mx-0">
      <th>序号</th>
      <th>课题编号</th>
      <th>课题名称</th>
      <th>教师编号</th>
      <th>教师姓名</th>
      <th>课题专业</th>
      <th>课题类型</th>
      <th>所选志愿</th>
      <th>审核状态</th>
      <th>操作</th>
</tr>
<?php
}else{
  echo "<div style='color:red' align='center'>很抱歉，没有审核通过的课题！</div>";
}
       if ($num>1) {
        $sql="select id,topic_id,topic_name,teacher_id,teacher_name,class,topic_type,min(will),status from topics_stu where username='$username' and status='通过'";
      }else{
         $sql="select id,topic_id,topic_name,teacher_id,teacher_name,class,topic_type,will,status from topics_stu where username='$username' and status='通过'";
      }
         $result=mysqli_query($conn,$sql);
           while($row = mysqli_fetch_assoc($result)){
            echo '<tr class="active">';
            foreach($row as $col){
                echo '<td>'.$col.'</td>';
            }
        ?>
              <form action="check_topic.php?id=<?php echo $row['id']?>" method="post">
               <td><input type="submit" value="确认"></td>
              </form>
  <?php
         echo '</tr>';
         echo "<div class='tishi'>温馨提示：请在上面的表单确认自己的论文选题（通过审核的课题大于1的时候，学生最终课题取优先志愿课题,如有异议，请联系管理员！）</div>";         
      }
?>

</body>
</html>