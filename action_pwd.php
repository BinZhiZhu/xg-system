<!-- 管理 修改密码的脚本 -->
<?php
header("content-type:text/html;charset=utf-8");
require('conn.php');
$newpassword=strtolower(trim($_POST['newpassword']));
$checkpassword=strtolower(trim($_POST['checkpassword']));  
if (empty($newpassword)|| empty($checkpassword)) {
	exit('填写信息不完整！<a href="javascript:;" onClick="javascript:history.back(-1);">返回</a>');
}

session_start();
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
  $result=mysqli_query($conn,"SELECT * FROM $table WHERE username='$_SESSION[username]'");   //获取结果数组  
  $row=mysqli_fetch_assoc($result); 
  if (!$row) {
  	exit('账号不存在！');
  }elseif($newpassword!=$checkpassword){
  exit('密码不一致,请重新输入！<a href="javascript:;" onClick="javascript:history.back(-1);">返回</a>');
}else{
    $rs=mysqli_query($conn,"UPDATE $table SET password='$newpassword' WHERE username='$_SESSION[username]'");
    exit('密码更改成功！<a href="logout.php" target="_top">返回登录</a> ');
  }


?>