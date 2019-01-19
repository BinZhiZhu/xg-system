<!-- 登录界面脚本 -->
<?php
require ('conn.php');
header("Content-Type:text/html;charset=utf-8");
$username=isset($_POST['username'])?strtolower(trim($_POST['username'])):'';
$password=isset($_POST['password'])?strtolower(trim($_POST['password'])):'';
$role=isset($_POST['role'])?strtolower(trim($_POST['role'])):'';
$authcode=isset($_POST['authcode'])?strtolower(trim($_POST['authcode'])):'';
$ip = $_SERVER["REMOTE_ADDR"];
date_default_timezone_set('PRC');//设置为中华人民共和国
$date = date("Y-m-d H:i:s",time());
if(empty($username)||empty($password)||empty($authcode)) {
     echo "<script>window.alert('请填写完整信息！')</script>";
       echo "<script>window.location='login.php'</script>";
   }
  //权限判断
      session_start();
       $biao='';
       if ($role==0) {
       $biao='student';
       }else{
        if ($role==1) {
        $biao='teacher';
       }elseif ($role==2) { 
          $biao='auditor';
       }else{
        $biao='admin';
       }
   }
$check_query = mysqli_query($conn,"SELECT * FROM $biao where username='$username'");
  $row=mysqli_fetch_array($check_query); 
  if(!$row){
    echo "<script>window.alert('用户不存在！')</script>";
    echo "<script>window.location='login.php'</script>";
  }else{
      if ($row['password']!=$password) {
         echo "<script>window.alert('密码错误！')</script>";
         echo "<script>window.location='login.php'</script>";
      }else{
       if($authcode!=$_SESSION['authcode']||$authcode==''||$_SESSION['authcode']==''){
      echo "<script>window.alert('验证码错误！')</script>";
       echo "<script>window.location='login.php'</script>";
    }else{
    //登录成功  
    $login_num=$row['login_num'];
  $sql= mysqli_query($conn,"UPDATE $biao SET login_num='$login_num'+1,ip='$ip',wtime='$date' WHERE username='$username'");
    $_SESSION['role_id'] =$row['role_id'];
    $_SESSION['ip']=$row['ip'];
    $_SESSION['login_num']=$row['login_num'];
    $_SESSION['wtime']=$row['wtime'];
    $_SESSION['name']=$row['name'];
    $_SESSION['username'] = $username;  
    $_SESSION['password'] = $row['password'];                      
   header("Location: index.php");    
 }
}
}
mysqli_close($conn);
?>
