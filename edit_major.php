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
        <?php 
      require 'conn.php';
      $id=intval($_GET['id']);
      $sql=mysqli_query($conn,"select * from major where id='$id'");
       $rs=mysqli_fetch_array($sql);
         ?>
</head>
<body>
<div class="container">	
<h2 class="page-header" style="font-size:20px;">修改专业班别</h2>
	<div class="row">
			<div class="col-sm-6 col-sm-offset-2">
				<form class="form-horizontal" method="post" name="student" action="action.php?action=update_major"  onSubmit="return myCheck()" >
						 <div class="form-group">
							<label for="inputPassword" class="col-sm-4 control-label">
								专业/班别
							</label>
							<div class="col-sm-8">
							<input type="hidden" name="id" value="<?php echo $rs['id']?>">
								<input class="form-control" id="" type="text" name="major_name" value="<?php echo $rs['major_name']?>">
							</div>
						</div>
				  <div class="button">
				    <td ><input type="submit"  id="submit" value="修改" style="width:50px" class="btn btn-default"> </td>
				    <td><input type="reset"  id="button" name="button" value="重置" style="width:50px" class="btn btn-default" >   </td>
				 </div>  
				
				</form>
				</table>
			</div>
	</div>
</div>
</body>
</html>


