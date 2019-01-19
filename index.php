<?php 
 include 'include/common.func.php'; 
chklogin();
 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <title>毕业论文选题系统--学生界面 </title>
  <link rel="stylesheet" href="css/layui.css">
</head>
<body class="layui-layout-body">
<!-- <?php 
$nowtime=strtotime(date("Y-m-d h:i:sa"));
$wtime=strtotime($_SESSION['wtime']);
$cgtime=3600;
$rand='';
$num='';
if ($nowtime-$wtime >= $cgtime) {
      $wime=$nowtime;
      $rand=mt_rand(1,20);
      $num=$_SESSION['login_num']+$rand;
}else{
    $num=$_SESSION['login_num']+20;
}

?> -->
<div class="layui-layout layui-layout-admin">
  <div class="layui-header">
    <div class="layui-logo">毕业论文选题系统</div>
    <!-- 头部区域（可配合layui已有的水平导航） -->
    <ul class="layui-nav layui-layout-left">
      <li class="layui-nav-item"><a href="main.php" target="mainFrame">首页</a></li>
      <?php 
      $table='';
       switch ($_SESSION['role_id']) {
         case '1':
           $table='student';
           break;
         case '2':
            $table='teacher';
           break;
        case '2':
            $table='auditor';
           break;       
         default:
            $table='admin';
           break;
       }
       ?>
       <li class="layui-nav-item"><a href="show_selfinfo.php?action=<?php echo $table ?>" target="mainFrame">用户中心</a></li>
      <li class="layui-nav-item"><a href="">选题管理</a></li>
      <li class="layui-nav-item">
        <a href="">其它系统</a>
        <dl class="layui-nav-child">
          <dd><a href="logout.php">学生管理系统</a></dd>
          <dd><a href="logout.php">教师管理系统</a></dd>
          <dd><a href="logout.php">审核员管理系统</a></dd>
          <dd><a href="logout.php">管理员管理系统</a></dd>
        </dl>
      </li>
      <li class="layui-nav-item">
<?php 
require_once 'include/time.php';
?></li>
<li class="layui-nav-item">
<?php 
require_once 'include/online.php';
?></li>
<li style="position:relative;left:780px;top:-42px; color: rgba(255,255,255,.7);"> 系统访问量：<?php echo $_SESSION['login_num']?></li>
    </ul>
<?php
require 'conn.php'; 
?>
    <ul class="layui-nav layui-layout-right">
      <li class="layui-nav-item">
        <a href="javascript:;">
          <img src="images/index_1.jpg" class="layui-nav-img">
          <?php echo $_SESSION['name'] ?>
        </a>
        <dl class="layui-nav-child">
          <dd><a href="<?php switch ($_SESSION['role_id']) {
            case '1':
             echo 'show_selfinfo.php?action=student';
              break;
              case '2':
                 echo 'show_selfinfo.php?action=teacher';
                break;
              case '3':
                echo 'show_selfinfo.php?action=auditor';
                break;  
            default:
             echo 'show_selfinfo.php?action=admin';
              break;
          } ?>" target="mainFrame">基本资料</a></dd>
          <dd><a href="changepwd.php" target="mainFrame">安全设置</a></dd>
        </dl>
      </li>
      <li class="layui-nav-item"><a href="logout.php">注销</a></li>
    </ul>
  </div>
  
<?php require 'menu.php'; ?>

  <div class="layui-body">
<!--   <button data-method="notice" class="layui-btn">示范一个公告层</button> -->
    <!-- 内容主体区域 -->
<iframe id="mainFrame" name="mainFrame" src="main.php" style="overflow: visible;" scrolling="auto" frameborder="no" width="100%" height="100%"></iframe>
  </div>
  
  <div class="layui-footer">
    <!-- 底部固定区域 -->
    <span style="margin-left:400px;">© xg_system.com 毕业论文选题系统 版权所有</span>
  </div>
</div>
<script src="layui.js"></script>
<script>
//JavaScript代码区域
layui.use('element', function(){
  var element = layui.element;
  
});
</script>
</body>
</html>