<!--  教师模块 教师审核课题（被学生选择的课题审核） -->
<html>
<head>
	<meta charset="UTF-8">
	<title>Document</title>
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
        }
td{
     background-color: #fff2fb;text-align: center;
 }
	</style>
</head>
<body>
<center><p>课题被选情况</p></center>
<hr width="90%">
<?php
    require ('conn.php');
    session_start();
    $username=$_SESSION['username'];
    $sql="select id,topic_id,topic_name,name,username,class,topic_type,will from topics_stu where teacher_id='$username'";
    $result=mysqli_query($conn,$sql);
    if ($sql &&mysqli_num_rows($result)) { 
       echo '<table>';
        echo '<tr>
       <th>序号</th>
      <th>课题编号</th>
      <th>课题名称</th>
      <th>学生学号</th>
      <th>学生姓名</th>
      <th>课题专业</th>
      <th>课题类型</th>
      <th>所选志愿</th>
      </tr>';
         while($row = mysqli_fetch_assoc($result)){
            echo '<tr>';
            foreach($row as $col){
                echo '<td>'.$col.'</td>';
            }
            // echo  "<form action='action_topic.php?action=checkTopic_stu&id={$row['id']}' method='post'>";
            // echo '<td><select name="status">
            // <option value="通过">通过</option>
            // <option value="不通过">不通过</option>
            // </select></td>';
            // echo '<td><input type="submit"/></td>'; 
            // echo '</form> '; 
            echo '</tr>';
}     
      echo '</table>';
    }else{
       echo '<div style="color:red" align="center">很抱歉，暂时没有学生选择你的课题</div>';
    }
   


  ?>
</body>
</html>
