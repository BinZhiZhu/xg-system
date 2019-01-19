<?php
header("content-type:text/html;charset=utf-8");
require ('conn.php');
session_start();
	$table='';
    if (empty($_SESSION['keywords'])) {
        	$table='student';
    }elseif ($_SESSION['keywords']=="教师") {
    	$table='teacher';
    }elseif($_SESSION['keywords']=="审核员"){
              $table='auditor';
   }else{
           $table="student";
       }
//信息的增删改--
switch ($_GET['action']) {
	###########用户信息录入#######
	    case 'insert_info'://添加信息
		$name=$_POST['name'];
		$sex=$_POST['sex'];
		$username=$_POST['username'];
		$major=$_POST['major'];
		$phone=$_POST['phone'];
		$role=$_POST['role'];
		$email=$_POST['email'];
		$ip = $_SERVER["REMOTE_ADDR"];
		$table="";
		if ($role=="学生") {
		$table="student";
			}elseif ($role=="教师") {
				$table="teacher";
			}else{
				$table="auditor";
			}
		if($name==""||$sex==""||$username==""||$major==""||$phone==""||$email==""||$role==""){
			echo "<script>window.alert('信息不能为空！重新填写');history.go(-1);</script>";	
		}else if ((preg_match("/^[a-zA-Z ]*$/",$name))||(preg_match("/^[0-9 ]*$/",$name)))  {
			echo "<script>window.alert('姓名不允许字母,数字和空格');history.go(-1);</script>";
		}else if(!preg_match("/^[0-9 ]*$/",$username)){
			echo "<script>window.alert('学号不允许字母和空格');history.go(-1);</script>";
			
		}else if(!preg_match("/1[3458]{1}\d{9}$/",$phone)){
			echo "<script>window.alert('电话号码格式错误');history.go(-1);</script>";

		}else if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email)) {
			echo "<script>window.alert('无效的 email 格式');history.go(-1);</script>";
			
		}else if( mysqli_fetch_array(mysqli_query($conn,"select * from $table where username = '$username'"))){
 			echo "<script>window.alert('账号已存在');history.go(-1);</script>";
		} else{

 			$sql= "insert into $table(name, sex, username,major,phone, email,ip)values('$name','$sex','$username','$major','$phone','$email','$ip')";
               $rs=mysqli_query($conn,$sql);
 				if($rs>0){
  	 					// echo "<script>window.alert('信息添加成功')</script>";
		            echo "<script>window.alert('信息添加成功');location='show_info.php'</script>";
 				}else{
   					echo "<script>window.alert('信息添加失败！')</script>"; 
 				}
		}
		break;
	
	    case 'update_info'://修改用户信息
	    $id=$_POST['id'];//更新的时候一定要获取到id
		$name=$_POST['name'];
		$sex=$_POST['sex'];
		$username=$_POST['username'];
		$major=$_POST['major'];
		$phone=$_POST['phone'];
		$email=$_POST['email'];
      	if ((preg_match("/^[a-zA-Z ]*$/",$name))||(preg_match("/^[0-9 ]*$/",$name)))  {
			echo "<script>window.alert('姓名不允许字母,数字和空格');history.go(-1);</script>";
		}else if(!preg_match("/^[0-9 ]*$/",$username)){
			echo "<script>window.alert('账号不允许字母和空格');history.go(-1);'</script>";
			
		}else if (preg_match("/^[a-zA-Z ]*$/",$major)) {
			echo "<script>window.alert('专业不允许字母和空格');history.go(-1);</script>";
			
		}else if(!preg_match("/1[3458]{1}\d{9}$/",$phone)){
			echo "<script>window.alert('电话号码格式错误');history.go(-1);</script>";

		}else if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email)) {
			echo "<script>window.alert('无效的 email 格式');history.go(-1);</script>";
			
		}else{
 			$sql="UPDATE $table SET name='$name', sex='$sex',username='$username',major='$major',phone='$phone',email='$email' WHERE id=$id ";
                 $rs=mysqli_query($conn,$sql);
 				if($rs>0){
  	 					echo "<script>window.alert('信息更新成功');history.go(-1);</script>";
 				}else{
   					echo "<script>alert('信息更新失败')</script>";
 				}
		}
	  
		break;
		
		case 'delete_info'://删除用户信息
			$id=$_GET['id'];//获取id
			$sql="DELETE FROM $table WHERE id=$id"; 
			$rs=mysqli_query($conn,$sql);
			if($rs>0){
			echo "<script>window.alert('删除成功！');history.go(-1);</script>";
		}else{
			echo "<script>window.alert('删除失败！');history.go(-1);</script>";
		}
		break;

//删除全选信息
		case 'delete_stu_all':
		$arr = $_POST["ck"];
		$str = implode("','",$arr);//拼接字符，
		$sql = "delete from student WHERE id in('{$str}')";
		if(mysqli_query($conn,$sql))//判断是否查询成功，
		{
		  header("location:stu_info.php");
		  //成功就跳转
		}
			break;


//个人信息更新模式
	    case 'update_selfinfo'://修改学生信息
	    $id=$_POST['id'];//更新的时候一定要获取到id
		$name=$_POST['name'];
		$sex=$_POST['sex'];
		$username=$_POST['username'];
		$major=$_POST['major'];
		$phone=$_POST['phone'];
		$email=$_POST['email'];
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
      	if ((preg_match("/^[a-zA-Z ]*$/",$name))||(preg_match("/^[0-9 ]*$/",$name)))  {
			echo "<script>window.alert('姓名不允许字母,数字和空格');history.go(-1);</script>";
		}else if(!preg_match("/^[0-9 ]*$/",$username)){
			echo "<script>window.alert('账号不允许字母和空格');history.go(-1);'</script>";
			
		}else if (preg_match("/^[a-zA-Z ]*$/",$major)) {
			echo "<script>window.alert('专业不允许字母和空格');history.go(-1);</script>";
			
		}else if(!preg_match("/1[3458]{1}\d{9}$/",$phone)){
			echo "<script>window.alert('电话号码格式错误');history.go(-1);</script>";

		}else if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email)) {
			echo "<script>window.alert('无效的 email 格式');history.go(-1);</script>";
			
		}else{
 			$sql="UPDATE $table SET name='$name', sex='$sex',username='$username',major='$major',phone='$phone',email='$email' WHERE id=$id ";
                 $rs=mysqli_query($conn,$sql);
 				if($rs>0){
  	 					echo "<script>window.alert('信息更新成功');history.go(-1);</script>";
 				}else{
   					echo "<script>alert('信息更新失败')</script>";
 				}
		}
	  
		break;
		

		case 'update_selfadmin':
		$id=$_POST['id'];
		$name=$_POST['name'];
		$sex=$_POST['sex'];
		$username=$_POST['username'];
		$phone=$_POST['phone'];
		$email=$_POST['email'];
	    mysqli_query($conn,"UPDATE admin SET name='$name', sex='$sex',username='$username',phone='$phone',email='$email' WHERE id=$id ");
	    echo "<script>window.alert('信息更新成功！')</script>";
	    echo "<script>window.location='action_selfinfo.php?action=admin'</script>";
		break;

		case 'update_news':
		 $id=$_POST['id'];
		 $title=$_POST['title'];
		 $content=$_POST['content'];
		 date_default_timezone_set('PRC');//设置为中华人民共和国
	     $wtime= date("Y-m-d H:i:s",time());
	     $sql="update news set title='$title',content='$content',wtime='$wtime' where id='$id'";
	     $rs=mysqli_query($conn,$sql);
	    if($rs>0){
  	 					echo "<script>window.alert('信息更新成功');location='show_news.php'</script>";
 				}else{
   					echo "<script>alert('信息更新失败')</script>";
 				}
		break;

	   case 'del_news':
	   	$id=$_GET['id'];
	   	$sql="DELETE FROM news WHERE id=$id"; 
		$rs=mysqli_query($conn,$sql);
		if($rs>0){
		  echo "<script>window.alert('删除成功！');history.go(-1);</script>";
		}else{
			echo "<script>window.alert('删除失败！');history.go(-1);</script>";
		}
	   	break;


	   	case 'update_major':
		 $id=$_POST['id'];
		 $major_name=$_POST['major_name'];
	     $sql="update major set major_name='$major_name' where id='$id'";
	     $rs=mysqli_query($conn,$sql);
	    if($rs>0){
  	 					echo "<script>window.alert('信息更新成功');location='show_major.php'</script>";
 				}else{
   					echo "<script>alert('信息更新失败')</script>";
 				}
		break;

	   case 'del_major':
	   	$id=$_GET['id'];
	   	$sql="DELETE FROM major WHERE id=$id"; 
		$rs=mysqli_query($conn,$sql);
		if($rs>0){
		  echo "<script>window.alert('删除成功！');history.go(-1);</script>";
		}else{
			echo "<script>window.alert('删除失败！');history.go(-1);</script>";
		}
	   	break;

	}
?>