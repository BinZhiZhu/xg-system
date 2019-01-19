<!-- 文件上传下载 -->
<html>
<head>
<meta charset="utf-8">
	<link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.min.css" />
<style>	
	.table{width: 30%;margin: 20px auto;}
h2{text-align: center;}
#upload{
	margin-left: 80px;
	margin-top: 15px;
}


</style>
</head>
<body background="images/main/timg2.jpg">
<div class="container">
		<h2 class="page-header" style="text-align: center;">文件上传</h2>
		<div class="row">
			<div class="col-sm-5 col-sm-offset-4">
				<form action="action_info.php?action=add_file" method="post" enctype="multipart/form-data" >
				 <strong>标题:</strong><input type="text" name="title" size="25">		   
			       <label for="file" class="col-sm-3 control-label">文件：</label>
				    <input type="file" name="file" id="file">
				    <input type="hidden" name="MAX_FILE_SIZE" value="2000000"> <br>
				     <div id="upload">
				     <input type="submit" id="submit" name="submit" value="上传" class="btn btn-primary">
				    </div>
				</form>
			</div>	
		</div>		
</div>
</body>
</html>