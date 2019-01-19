<!-- 个人密码修改界面 -->
<html>
<head>
  <meta charset="UTF-8">
  <title>Document</title>
  <link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.min.css" />
  <link rel="stylesheet" href="css/layui.css">
<style>
.table{width: 30%;margin: 25px auto;}
h3{text-align: center;}
.layui-btn{position:relative;top:20px;left: -20px;}
  </style>
</head>
<body>
<?php  

    //连接mysql数据库  
     require("conn.php");
        //查找id  
       session_start();
       $biao='';
       if ($_SESSION['role_id']==1) {
       $biao='student';
       }else{
       	if ($_SESSION['role_id']==2) {
       	$biao='teacher';
       }elseif ($_SESSION['role_id']==3) {
       		$biao='auditor';
       }else{
       	$biao='admin';
       }
   }
        $result=mysqli_query($conn,"SELECT * FROM $biao WHERE username='$_SESSION[username]'");   
        //获取结果数组  
        $table=mysqli_fetch_assoc($result); 

?>  
<div class="container">
	<h2 class="page-header" style="font-size:20px;text-align:center">修改密码</h2>
			<div class="row" style="margin-top:30px;">
				<div class="col-sm-6 col-sm-offset-2">
					<form class="form-horizontal" role="form" method="post" action="action_pwd.php">
						<div class="form-group">
							<label for="firstname" class="col-sm-4 control-label">旧密码</label>
							<div class="col-sm-8">
								<input type="text" class="form-control" id="firstname" name="oldpassword" value="<?php echo $table['password']?>">
							</div>
						</div>
						<div class="form-group">
							<label for="lastname" class="col-sm-4 control-label">新密码</label>
							<div class="col-sm-8">
								<input type="password" class="form-control" id="lastname" 
									   placeholder="请输入新密码" name="newpassword">
									   <input type='hidden' name='id' value="<?php echo $table['id']?>">
							</div>
						</div>
                       
                       <div class="form-group">
							<label for="lastname" class="col-sm-4 control-label">确认密码</label>
							<div class="col-sm-8">
								<input type="password" class="form-control" id="lastname" 
									   placeholder="确认密码" name="checkpassword">
							</div>
						</div>


						<div class="form-group">
							<div class="col-sm-offset-6 col-sm-5">
								<button  data-method="notice" class="layui-btn">确定修改</button>  
								<button  data-method="notice" class="layui-btn">重置</button>  
							</div>
						</div>
						
						
					</form>
				</div>
				
				
			</div>
			
		</div>

</body>
</html>

