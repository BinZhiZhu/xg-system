<?php 
require 'conn.php';
header("Content-Type:text/html;charset=utf-8");
if(!empty($_GET['id'])){  
        //查找id  
        $id=intval($_GET['id']);  
        $tp=mysqli_query($conn,"select topic_id,teacher_id from topics_stu where id='$id'");
        $rows=mysqli_fetch_assoc($tp);
        session_start();
        $check=mysqli_query($conn,"select z_index from student where username='$_SESSION[username]' ");
        $rs=mysqli_fetch_assoc($check);
        $sql="UPDATE student SET z_index='yes' WHERE username='$_SESSION[username]'";
       $sql1="UPDATE topics SET z_index='yes' WHERE topic_id='$rows[topic_id]' and teacher_id='$rows[teacher_id]' ";
       if ($rs['z_index']=='yes') {
         echo "<script>window.alert('请勿重复确认课题');history.go(-1);</script>";
       }elseif (mysqli_query($conn,$sql)&&mysqli_query($conn,$sql1)){
             echo "<script>window.alert('已确认课题');history.go(-1);</script>";
    }else{
               echo"<script>window.alert('确认失败！');history.go(-1);</script>";
            }
     }
      else{  
        die('id not define');  
    }        


 ?>