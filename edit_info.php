<!-- 管理员模块 用户信息修改界面 -->
<html>
<head>
  <meta charset="UTF-8">
  <title>个人信息修改</title>
  <link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/layui.css">
  <style>
  	h2{
  		text-align: center;
  	}
*{ margin:0 auto;}
}
</style>
</head>
<body>
 <?php  
 if(!empty($_GET['id'])){  
        //连接mysql数据库  
       require('conn.php');
        //查找id  
        $id=intval($_GET['id']);
        session_start();
        $table='';
        if (empty($_SESSION['keywords'])) {
        	$table='student';
        }elseif ($_SESSION['keywords']=='教师') {
        	$table='teacher';
        }elseif ($_SESSION['keywords']=='审核员') {
        	$table='auditor';
        }else{
        	$table='student';
        }
        $result=mysqli_query($conn,"SELECT * FROM $table WHERE id=$id");   
        //获取结果数组  
        $result_arr=mysqli_fetch_assoc($result);  
        
    }else{  
        die('id not define');  
    }  
        
?>  
<div class="container">
			<h2 class="page-header">个人信息修改</h2>
			<div class="row">
				<div class="col-sm-6 col-sm-offset-2">
					<form class="form-horizontal" role="form" method="post" action="action.php?action=update_info">
						<input type='hidden' name='id' value="<?php echo $result_arr['id']?>">
						<div class="form-group">
							<label for="inputPassword" class="col-sm-4 control-label">
								姓名
							</label>
							<div class="col-sm-8">
								<input class="form-control" type="text" name="name" value="<?php echo $result_arr['name']?>">
								
							</div>
						</div>
						
						<div class="form-group">
							<label for="inputPassword" class="col-sm-4 control-label">
								学号
							</label>
							<div class="col-sm-8">
								<input class="form-control" id="" type="text" name="username" value="<?php echo $result_arr['username']?>">
							</div>
						</div>
												
						<div class="form-group">
							<label for="inputPassword" class="col-sm-4 control-label" style="padding-top: 1px;">
								性别
							</label>
							<div class="col-sm-8">
								<input type="radio" name="sex" value="男"<?php echo ($result_arr['sex']=="男")?"checked":"";?>>男
  							<input type="radio" name="sex" value="女" <?php echo ($result_arr['sex']=="女")?"checked":"";?>>女
							</div>
						</div>
						
						<div class="form-group">
							<label for="lastname" class="col-sm-4 control-label">专业</label>
							<div class="col-sm-8">
								<input class="form-control" type="text" name="major" value="<?php echo $result_arr['major']?>">
							</div>
						</div>	
									  						
						<div class="form-group">
							<label for="lastname" class="col-sm-4 control-label">电话</label>
							<div class="col-sm-8">
								<input class="form-control" type="text" name="phone" value="<?php echo $result_arr['phone']?>">
							</div>
						</div>
						<div class="form-group">
							<label for="lastname" class="col-sm-4 control-label">邮箱</label>
							<div class="col-sm-8">
								<input  class="form-control" type="text" name="email" value="<?php echo $result_arr['email']?>">
							</div>
						</div>
						
						<div class="form-group">
							<div class="col-sm-offset-6 col-sm-5">
							<button  data-method="notice" class="layui-btn">确定修改</button>  
							</div>
						</div>
					</form>
				</div>
				
				
			</div>
			
		</div>

</body>
</html>







