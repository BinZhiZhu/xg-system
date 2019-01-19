<!-- 管理 留言功能的脚本 -->
<?php
header("content-type:text/html;charset=utf-8");
require ('conn.php');
switch ($_GET['action']) {
		case 'add_message_stu'://添加留言
		session_start();
		$username=$_SESSION['username'];     
 		$result=mysqli_query($conn,"SELECT name FROM student where username=$username");
 		$row=mysqli_fetch_array($result);
		$title =$_POST["title"];  
		$sendee =$_POST["sendee"]; 
		$content =$_POST["content"];  
		$date = date("Y-m-d H:i:s",time());
		$sql="INSERT INTO message(sendee,sender,username,title,content,date)
		VALUES ('$sendee','$row[name]','$username','$title','$content','$date')";
		$rs=mysqli_query($conn, $sql);
		if ($rs>0) {
		    echo "<script>window.alert('留言成功！')</script>";
		    echo "<script>window.location='messages.php'</script>";
		} else {
		    echo "<script>window.alert('留言失败！')；history.go(-1);</script>";
		}
		break;


		case 'del_message': //删除留言
			$id=intval($_GET['id']); 
			$sql="DELETE FROM message where id=$id ";
			$rs=mysqli_query($conn,$sql);
			if ($rs>0) {
				echo "<script>window.alert('删除成功！')</script>";
			}else{
				echo "<script>window.alert('删除失败！')</script>";
			}
			header("location:messages.php");
			break;

		case 'del_reply': //删除留言
			$id=intval($_GET['id']); 
			$sql="DELETE FROM reply where id=$id ";
			$rs=mysqli_query($conn,$sql);
			if ($rs>0) {
				echo "<script>window.alert('删除成功！')</script>";
			}else{
				echo "<script>window.alert('删除失败！')</script>";
			}
			header("location:messages.php");
			break;

		case 'reply_message': //回复留言 
		    $content=$_POST['content'];
		    $title=$_POST['title'];
		    $date = date("Y-m-d H:i:s",time());
		    session_start();
		   $sql="INSERT INTO reply(username,sender,sendee,content,title,rpname,date)
		    VALUES ('$_SESSION[username]','$_SESSION[name]','$_SESSION[sender]','$content','$title','$_SESSION[rpname]','$date')";
			$rs=mysqli_query($conn,$sql);
			if ($rs>0) {
				echo "<script>window.alert('回复成功！')</script>";
				echo "<script>window.location='messages.php'</script>";
			}else{
				echo "<script>window.alert('回复失败！');history.go(-1);</script>";
			}
			break;

		case 'del_adminmessage': //管理员删除留言
			$id=intval($_GET['id']); 
			$sql="DELETE FROM message where id=$id ";
			$rs=mysqli_query($conn,$sql);
			if ($rs>0) {
				echo "<script>window.alert('删除成功！')</script>";
			}else{
				echo "<script>window.alert('删除失败！')</script>";
			}
			header("location:adminMessages.php");
			break;
		}
		?>