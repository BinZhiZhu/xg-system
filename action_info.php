<!-- 管理信息和文件上传与下载 -->
<?php 
require 'conn.php';
header("Content-Type:text/html;charset=utf-8");
switch ($_GET['action']) {
	case 'add_news':
	$title=$_POST['title'];
	$content=$_POST['content'];
	date_default_timezone_set('PRC');//设置为中华人民共和国
	$wtime= date("Y-m-d H:i:s",time());
 	if (empty($title)||empty($content)) {
	echo "<script>window.alert('请填写完整信息！');history.back();</script>";
	exit;
	}
	session_start();
    $sql=mysqli_query($conn,"INSERT INTO news(title,content,author,wtime) VALUES('$title','$content','$_SESSION[name]','$wtime')");
	$row=mysqli_fetch_assoc($sql);
	if ($row<0) {	
	echo"<Script>window.alert('添加失败!');history.back()</Script>"; 
	}else{
	header("Location: main.php"); 
	// echo"<Script>window.alert('信息添加成功');location.href='main.php'</Script>"; 
	}
	    break;
	case 'add_major':
		$major_name=$_POST['major_name'];
		if (empty($major_name)) {
			echo "<script>window.alert('请填写专业');history.back()</script>";
			exit;
		}
		$sql1=mysqli_query($conn,"select major_name from major where major_name='$major_name'");
		$rs=mysqli_num_rows($sql1);
		if ($rs>0) {
			echo "<script>window.alert('该专业已经存在！');history.back()</script>";
			exit;
		}else{
		$sql=mysqli_query($conn,"INSERT INTO major(major_name) VALUES ('$major_name')");
		$row=mysqli_fetch_array($sql);
		if ($row<0) {	
		echo"<Script>window.alert('添加失败!');history.back()</Script>"; 
		exit;
		}else{
		header("Location: show_major.php"); 
		 }
		}
		
		break;

	case 'add_file':
	$uploaddir = "upfiles/";//设置文件保存目录 注意包含/ 
	$type=array("jpg","gif","bmp","jpeg","png","doc","docx","xlsx","excel","txt");//设置允许上传文件的类型 
	$patch="upload/";//程序所在路径  
	//获取文件后缀名函数 
	function fileext($filename) 
	{ 
	return substr(strrchr($filename, '.'), 1); 
	} 
	$a=strtolower(fileext($_FILES['file']['name'])); 
	//判断文件类型 
	if(!in_array(strtolower(fileext($_FILES['file']['name'])),$type)) 
	{ 
	$text=implode(",",$type); 
	echo "您只能上传以下类型文件: ",$text,"<br>"; 
	} 
	//生成目标文件的文件名 
	else{ 
	$filename=explode(".",$_FILES['file']['name']); 
	do 
	{ 
	//$filename[0]=random(10); //设置随机数长度 
	$name=implode(".",$filename); 
	//$name1=$name.".Mcncc"; 
	$uploadfile=$uploaddir.$name; 
	} 

	while(file_exists($uploadfile)); 
	if (move_uploaded_file($_FILES['file']['tmp_name'],$uploadfile)) 
	{ 
	
	if(is_uploaded_file($_FILES['file']['tmp_name'])) 
	    { 
	   echo "上传失败!"; 
	} 
	} 
	} 	
	$title=$_POST['title']; 
	$pic=$uploadfile; 
    $ip = $_SERVER["REMOTE_ADDR"];
    date_default_timezone_set('PRC');//设置为中华人民共和国
	$wtime = date("Y-m-d H:i:s",time());
	if(empty($title)) {
		echo "<Script>window.alert('对不起！你输入的信息不完整!');history.back()</Script>"; 
	}
	  $sql=""; 
	  $result=mysqli_query($conn,"insert into upload(title,pic,wtime,ip) values('$title','$pic','$wtime','$ip')"); 
	  $row=mysqli_fetch_assoc($result);
	  if ($row<0) {
	  	echo "<Script>window.alert('文件上传失败!');history.back()</Script>"; 
	  }else{
	  	 header("Location: main.php"); 
	  }
	 
	 break;

    }
 ?>