<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/layui.css">
	</head>
	<body>
	<?php 
	 require 'conn.php';
      $act=@$_GET['act']?$_GET['act']:'get_topic';
      if ($act=='get_topic') {
   $sql="select topic_name,teacher_name,teacher_id,content from topics where id='$_GET[id]'";
   $query=mysqli_query($conn,$sql);
   $row=mysqli_fetch_array($query);
 ?> 
     <h2 class="page-header" style="font-size:20px;text-align:center"><?php echo $row['topic_name'] ?></h2>
   <center><span>指导老师：<a href="topic_show.php?act=get_teacher&id=<?php echo $row['teacher_id'] ?>" style="color:red"><?php echo $row['teacher_name'] ?></a></span></center>
   <div class="content" style="padding-top:10px;padding-left:20px;line-height:30px;">
<?php 
        if ($row['content']) {
			   echo $row['content'];
			 }else{
			 	echo "<center><p style='color:red'>抱歉，暂无课题介绍!可联系相关教师</p></center>";
			 }
			 ?>
			</div>
		</div>
<?php
  }elseif ($act='get_teacher') {
  	$username=$_GET['id'];
     $sql= mysqli_query($conn,"SELECT * FROM teacher where username='$username'"); 
     if ($rs = mysqli_fetch_assoc($sql)) {		
     ?>
			<p><a href="">首页</a>&nbsp>>&nbsp <a href="">课题查询</a>&nbsp>>&nbsp<a href="">课题介绍</a>&nbsp>>&nbsp<a href="">教师介绍</a></p>
			<hr />
	    <header align="center" style="font-size:20px;line-height:32px;"><?php echo $rs['name'] ?></header>
     <table class="table table-hover table-bordered " width="500" style="margin-top:10px;text-align:center" > 
         <tr><td class='success'>姓名 </td> 
        <td> <?php echo $rs['name']?> </td>
         </tr>
    <tr ><td class='success'>性别 </td> 
         <td><?php echo $rs['sex'] ?> </td>
         </tr>
   <tr ><td class='success'>工号 </td>
         <td><?php echo $rs['username'] ?> </td>
         </tr>
    <tr ><td class='success'>专业领域 </td> 
        <td><?php echo $rs['major'] ?> </td>
        </tr>
    <tr><td class='success'>电话 </td> 
         <td><?php echo $rs['phone']?>  </td>
         </tr>
  <tr><td class='success'>邮箱 </td> 
         <td><?php echo $rs['email']?> </td>
         </tr>
         </table>
     <?php
     }
  }
	 ?>	
	</body>
</html>





