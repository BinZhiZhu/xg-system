<!-- 管理员模块 头部 -->
<style>
*{ margin: 0px}

#header{
  position: relative;
 background: url(images/menu-header.png);background-repeat: no-repeat;line-height: 20px;
}
div{width: 100%;height: 100%;}
#title{
	width: 515px;
	/*max-width: none !important;*/
     margin-left: 450px;
      position: absolute;
      margin-top: 20px;
      font-family: "隶书";
      font-size: 30px;
      color:#FFFFFF;
}
#userid{
     font-family: "正楷";
  color: #FFFFFF;
  font-size: 10px;
  margin-left:10px; 
  position: absolute;
  margin-top: 20px;
}
#online{
   font-family: "正楷";
   color: white;
  font-size: 10px;
  margin-left:1150px; 
    margin-top: -15px;
  position: absolute;
}
#username{
  margin-top:10px; 
}

 </style>

<body>
<div id="header">
<?php
require_once 'conn.php';
    session_start();
    switch ($_SESSION['role_id']) {
      case '0':
         echo '<font id="title" >毕业设计选题系统——学生管理界面</font>';
          if(!empty($_SESSION['username'])){ 
      echo "<div id='userid'>学号&nbsp:&nbsp".$_SESSION['username'];
    } 
        $username=$_SESSION['username'];      
       $result=mysqli_query($conn,"SELECT name FROM student where username=$username");
        $row=mysqli_fetch_array($result);
       echo "<div id='username'>学生：".$row['name'];
        break;

        case '1':
           echo '<font id="title" >毕业设计选题系统——教师管理界面</font>';
           if(!empty($_SESSION['username'])){ 
      echo "<div id='userid'>工号&nbsp:&nbsp".$_SESSION['username'];
    } 
        $username=$_SESSION['username'];      
       $result=mysqli_query($conn,"SELECT name FROM teacher where username=$username");
        $row=mysqli_fetch_array($result);
        echo "<div id='username'>教师：".$row['name'];
           break;

        case '2':
           echo '<font id="title" >毕业设计选题系统——审核员管理界面</font>';
           if(!empty($_SESSION['username'])){ 
      echo "<div id='userid'>工号&nbsp:&nbsp".$_SESSION['username'];
    } 
          $username=$_SESSION['username'];     
         $result=mysqli_query($conn,"SELECT name FROM auditor where username='$username'");
          $row=mysqli_fetch_array($result);
          echo "<div id='username'>审核员：".$row['name'];
          break;

      default:
        echo '<font id="title" >毕业设计选题系统——管理员管理界面</font>';
        if(!empty($_SESSION['username'])){ 
      echo "<div id='userid'>学号&nbsp:&nbsp".$_SESSION['username'];
    } 
        $username=$_SESSION['username'];    
       $result=mysqli_query($conn,"SELECT name FROM admin where username=$username");
        $row=mysqli_fetch_array($result);
        echo "<div id='username'>管理员：".$row['name'];
        break;
    }
  mysqli_close($conn); 
   require 'time.php';
   require 'online.php';
   ?>
</div>
</body>
