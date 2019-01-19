<?php require 'conn.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>随机分配课题</title>
	  <link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.min.css" />
	   <link rel="stylesheet" href="css/layui.css">
	<style>
   .stu{float:left;line-height: 40px;margin-left: 25px}
   .stu span{font-size: 20px;color: red;margin-left: 160px}
   .tops{float:right;line-height: 40px;margin-left: 45px}
   .tops span{font-size: 20px;color: red;margin-left: 150px}
	</style> 
   <script language="JavaScript">
	function refresh()
	{
	       window.location.reload();
	}
</script>
</head>
<body>
<h2 class="page-header" style="text-align:center;font-size:20px">论文课题随机分配</h2>
<div class="form-group">
<div class="col-sm-offset-6 col-sm-5">
<button  data-method="notice" class="layui-btn" onclick="refresh()" style="margin-left:-50px;">开始分配</button> 
</div>
</div> 
<div class="stu">
<span>待匹配学生</span>
<div class="left">
<?php 
$query = mysqli_query($conn,"select username,name,major from student where z_index='no' ");
while($rows = mysqli_fetch_array($query)){
//可以直接把读取到的数据赋值给数组或者通过字段名的形式赋值也可以
$array[]= $rows;
}
shuffle($array);
foreach ($array as $v) {
	echo "学号:".'&nbsp'.$v['username'].'&nbsp'."姓名:".'&nbsp'.$v['name'].'&nbsp'."专业:".'&nbsp'.$v['major'].'<br />';
}
 ?>
</div>
</div>	
<div class="tops">
<span>待匹配课题</span>
<div class="right">
<?php 
$query1= mysqli_query($conn,"select teacher_id,topic_name,teacher_name from topics where z_index='no' ");
while($rows = mysqli_fetch_array($query1)){
//可以直接把读取到的数据赋值给数组或者通过字段名的形式赋值也可以
$array1[]= $rows;
}
shuffle($array1);
foreach ($array1 as $v1) {
	echo "教师编号:".'&nbsp'.$v1['teacher_id'].'&nbsp'."课题名称:".'&nbsp'.$v1['topic_name'].'&nbsp'."所属教师:".'&nbsp'.$v1['teacher_name'].'<br />';
}
 ?>
</div>
</div>	

</body>
</html>
