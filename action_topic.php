<?php
require 'conn.php';
header("Content-Type:text/html;charset=utf-8");
switch ($_GET['action']) {
    //学生选择课题
    case 'choose_topic':
         if(!empty($_GET['id'])){  
        //查找id  
        $id=intval($_GET['id']);  
        $will=$_POST['will'];
         session_start();
        $username=$_SESSION['username']; 
        $topic=mysqli_query($conn,"select * from topics where id=$id");    
        $student=mysqli_query($conn,"select name,major from student where username='$username'");
        $topic_arr=mysqli_fetch_assoc($topic);
        $student_arr=mysqli_fetch_assoc($student);
        $sql="INSERT INTO topics_stu(username,name,major,topic_id,topic_name,teacher_id,teacher_name,class,topic_type,will)VALUES('$username','$student_arr[name]','$student_arr[major]','$topic_arr[topic_id]','$topic_arr[topic_name]','$topic_arr[teacher_id]','$topic_arr[teacher_name]','$topic_arr[class]','$topic_arr[topic_type]','$will');";
    if (mysqli_query($conn,$sql)){
            echo "<script>window.alert('选择课题提交成功')</script>";
           echo "<script>window.location='show_topic.php'</script>";
    }else{
              echo "<script>window.alert('选择课题提交失败！请检查是否有重复提交')</script>"; 
           echo "<script>window.location='show_topic.php'</script>";
            }
     }
      else{  
        die('id not define');  
    }        
        break;
     
     //教师申请课题信息
     case 'add_topic':
         $content=isset($_POST['content'])?strtolower(trim($_POST['content'])):'';
         $topic_id=isset($_POST['topic_id'])?strtolower(trim($_POST['topic_id'])):'';
         $topic_name=isset($_POST['topic_name'])?strtolower(trim($_POST['topic_name'])):'';
         $topic_type=isset($_POST['topic_type'])?strtolower(trim($_POST['topic_type'])):'';
         $class=isset($_POST['class'])?strtolower(trim($_POST['class'])):'';
         $total_stu=isset($_POST['total_stu'])?strtolower(trim($_POST['total_stu'])):'';
         if (empty($topic_id) || empty($content)||empty($topic_name)||empty($topic_type)||empty($class)||empty($total_stu)){
       echo "<script>window.alert('当前表单不能有空项！');history.back();</script>";
  }else{
     // $now_stu=$_POST['now_stu'];
         session_start();
         $username=$_SESSION['username'];
         $sql=mysqli_query($conn,"select name from teacher where username='$username'");
         $teacher_arr=mysqli_fetch_assoc($sql);
         $query=mysqli_query($conn,"INSERT INTO topics(topic_id,topic_name,topic_type,teacher_id,teacher_name,class,total_stu,content) VALUES('$topic_id','$topic_name','$topic_type','$username','$teacher_arr[name]','$class','$total_stu','$content')");
         if ($sql &&$query>0) {
              echo "<script>window.alert('课题信息添加成功！')</script>";
              echo "<script>window.location='topics_status.php'</script>";
         }else{
            echo "<script>window.alert('课题信息添加失败！');history.go(-1)</script>";
         }
  }
        
         break;

        //老师审核学生课题
        case 'checkTopic_stu':
         if(!empty($_GET['id'])){  
        //查找id  
        $id=intval($_GET['id']);  
        $status=$_POST['status'];
        $sql=mysqli_query($conn,"update topics_stu set status='$status' where id='$id'");
       // $new_total= $topic_arr['total_stu']-1;
       // $new_now= $topic_arr['now_stu']-1;
    if ($sql>0){
            echo "<script>window.alert('课题审核成功！')</script>";
           echo "<script>window.location='endTopic_teacher.php'</script>";
    }else{
              echo "<script>window.alert('课题审核失败！');history.go(-1);</script>"; 
            }
     
     }else{  
        die('id not define');  
    }        
        break;

   //审核员审核教师申请的课题
   case 'checkTopic_teacher':
       if(!empty($_GET['id'])){  
        //查找id  
        $id=intval($_GET['id']);  
        $status=$_POST['status'];
        $sql=mysqli_query($conn,"update topics set status='$status' where id='$id'");
       // $new_total= $topic_arr['total_stu']-1;
       // $new_now= $topic_arr['now_stu']-1;
    if ($sql>0){
            echo "<script>window.alert('课题审核成功！')</script>";
           echo "<script>window.location='endTopic_auditor.php'</script>";
    }else{
              echo "<script>window.alert('课题审核失败！');history.go(-1);</script>"; 
            }
     
     }else{  
        die('id not define');  
    }        
       break;
//教师删除审核不通过的课题
       case 'del_topics':
        if (!empty($_GET['id'])) {
        $id=intval($_GET['id']);
        $sql="DELETE FROM topics where id='$id'";
        $rs=mysqli_query($conn,$sql);
      if ($rs>0) {
        echo "<script>window.alert('删除成功！')</script>";
      }else{
        echo "<script>window.alert('删除失败！')</script>";
      }
      header("location:teaPass_no.php");
        }
         break;

    default:
        # code...
        break;
}

?>