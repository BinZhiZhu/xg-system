<!-- 查看个人信息的脚本 -->
<html>
<head>
  <meta charset="UTF-8">
  <title></title> 
  <link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/layui.css">
    <style>
            .table{width: 40%;height:50%;margin: 25px auto;border: 1px solid black;text-align: center;}
            button{position: absolute;left: 520px;top: 420px;}
    </style>
</head>
<body>
<div class="container">
<h2 class="page-header" style="font-size:20px;text-align:center">个人信息</h2>
<table class="table table-hover table-bordered "> 
<?php
header("content-type:text/html;charset=utf-8");
require ('conn.php');
session_start();
$table='';
switch ($_SESSION['role_id']) {
  case '1':
    $table='student';
    break;
  case '2':
      $table='teacher';
     break;
  case '3':
      $table='auditor';
     break;
  default:
    $table='admin';
    break;
}
$sql= mysqli_query($conn,"SELECT * FROM $table where username='$_SESSION[username]'"); 
$row=mysqli_fetch_assoc($sql);
?>
     <tr ><td class='success'>姓名 </td> 
         <td><?php echo $row['name']?> </td>
         </tr>
      <tr ><td class='success'>性别 </td> 
         <td><?php echo $row['sex']?> </td>
         </tr>
    <tr ><td class='success'>账号 </td>
         <td><?php echo $row['username']?> </td>
         </tr>
    <tr ><td class='success'>专业 </td> 
        <td><?php echo $row['major']?> </td>
    </tr>
  <tr><td class='success'>电话 </td> 
         <td><?php echo $row['phone']?></td>
         </tr>
    <tr><td class='success'>邮箱 </td> 
         <td><?php echo $row['email']?></td>
         </tr>
   <button  data-method="notice" class="layui-btn" onclick="location='edit_selfinfo.php?id=<?php echo $row['id'] ?>'">修改信息</button>
</table>
</div>
</body>
</html>