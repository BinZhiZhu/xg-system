<!-- 管理员模块 添加学生界面 -->
<?php 
require 'include/common.func.php';
 checklogin();
 ?>
<html>
<head>
<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="bootstrap-3.3.7-dist/css/bootstrap.min.css"/>
	  <link rel="stylesheet" href="css/layui.css">
  <style>
  		h2{
  		text-align: center;
  	}
	.button{
		margin-left: 220px;
		padding-top: 10px;
	}
  </style>
  <script type="text/javascript">  
            function myCheck()  
            {  
               for(var i=0;i<document.student.elements.length-1;i++)  
               {  
                  if(document.student.elements[i].value=="")  
                  {  
                     alert("当前表单不能有空项");  
                     document.student.elements[i].focus();  
                     return false;  
                  }  
               }  
               return true;  
                
            }  
        </script>
</head>
<body>
<div class="container">	
<h2 class="page-header" style="font-size:20px;">用户信息录入</h2>
	<div class="row">
			<div class="col-sm-6 col-sm-offset-2">
				<form class="form-horizontal" method="post" name="student" action="action.php?action=insert_info"  onSubmit="return myCheck()" >
						 <div class="form-group">
							<label for="inputPassword" class="col-sm-4 control-label">
								姓名
							</label>
							<div class="col-sm-8">
								<input class="form-control" id="" type="text" name="name">
								<!--<span class="error">* <?php echo $nameErr;?></span>-->
							</div>
						</div>
						 <div class="form-group">
							<label for="inputPassword" class="col-sm-4 control-label">
								账号
							</label>
							<div class="col-sm-8">
								<input class="form-control" id="" type="text" name="username" >
							</div>
						</div>
				
						 <div class="form-group">
							<label for="inputPassword" class="col-sm-4 control-label" style="padding-top: 1px;">
								性别
							</label>
							<div class="col-sm-8">
								<input type="radio" name="sex" value="男">男
					      		<input type="radio" name="sex" value="女">女
					      		<!--<span class="error">* <?php echo $sexErr;?></span>-->
							</div>
						</div>
				<div class="form-group">
				    <label for="firstname" class="col-sm-4 control-label">
					   用户身份
					</label>
					<div class="col-sm-8">
		            <select name="role" class="form-control" >
					<option value="">选择身份</option>
					<option value="学生">学生</option>
					<option value="教师">教师</option>
					<option value="审核员">审核员</option>
					</select>
					</div>
					</div>

				    <div class="form-group">
				    <label for="firstname" class="col-sm-4 control-label">
					   专业
					</label>
					<div class="col-sm-8">
		            <select name="major" class="form-control" >
					<option value="">选择班级</option>
					<?php
					require 'conn.php';
					$sql= mysqli_query($conn,"select * from major");
					while($row = mysqli_fetch_array($sql))
					  {
					    echo "<option value='$row[major_name]'>$row[major_name]</option>";//循环，拼凑下拉框选项
					  } 
					?>
					</select>
					</div>
						</div>
				
				  		<div class="form-group">
							<label for="lastname" class="col-sm-4 control-label">电话</label>
							<div class="col-sm-8">
								<input type="text" name="phone" class="form-control" id="lastname" 
									   placeholder="">
							</div>
						</div>
						<div class="form-group">
							<label for="lastname" class="col-sm-4 control-label">邮箱</label>
							<div class="col-sm-8">
								<input type="text" name="email" class="form-control" id="lastname" 
									   placeholder="">
									   <!--<span class="error">* <?php echo $emailErr;?></span></td>-->
							</div>
						</div>
				  <div class="button">
				    <td ><input type="submit"  id="submit" value="添加" style="width:50px" class="btn btn-default"> </td>
				    <td><input type="reset"  id="button" name="button" value="重置" style="width:50px" class="btn btn-default" >   </td>
				 </div>  
				
				</form>
				</table>
			</div>
	</div>
</div>
</body>
</html>


