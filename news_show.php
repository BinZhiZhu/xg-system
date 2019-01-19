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
   $sql="select * from news where id='$_GET[id]'";
   $query=mysqli_query($conn,$sql);
   $row=mysqli_fetch_array($query);
 ?>
   <h2 class="page-header" style="font-size:20px;text-align:center"><?php echo $row['title'] ?></h2>
  <center><span>发布者：管理员</span><span style="padding-left:20px;line-height:30px;">发布时间：<?php echo $row['wtime']?></span></center>
   <div class="content" style="padding-top:10px;padding-left:80px;line-height:30px;">
<?php 
        if ($row['content']) {
			   echo $row['content'];
			 }else{
			 	echo "<center><p style='color:red'>抱歉，暂无课题介绍!可联系相关教师</p></center>";
			 }
			 ?>
			</div>
		</div>
	</body>
</html>





