<!-- 退出系统 脚本 -->
<?php
 session_start();
 if (isset($_SESSION['username'])){
	unset($_SESSION['username']);	
}
setcookie(session_name(),'',time()-3600);//销毁与客户端的cookie
session_destroy();
header("Location: login.php");	
?>