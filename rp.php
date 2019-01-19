<!-- 回复留言 -->
<html>
<head>
  <meta charset="UTF-8">
  <title>Document</title>
  <link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.min.css" />
  <link rel="stylesheet" href="css/layui.css">
  <?php 
       require 'conn.php';
       session_start();
       $id=intval($_GET['id']);
       $result=mysqli_query($conn,"SELECT * FROM reply WHERE id='$id'");   
        //获取结果数组  
        $rs=mysqli_fetch_assoc($result); 
        $_SESSION['sender']=$rs['username'];
        $_SESSION['rpname']=$rs['sender'];
   ?>
</head>
<body>
<div class="container">
	<h2 class="page-header" style="font-size:20px;text-align:center">回复留言</h2>
			<div class="row">
				<div class="col-sm-6 col-sm-offset-2">
					<form class="form-horizontal" role="form" method="post" action="action_words.php?action=reply_message">
						<div class="form-group">
							<label for="inputPassword" class="col-sm-4 control-label">
								回复人账号
							</label>
							<div class="col-sm-8">
								<input class="form-control" id="" type="text"  disabled="disabled" name="sendee" value="<?php echo $rs['username']?>">								
							</div>
						</div>
						<div class="form-group">
							<label for="inputPassword" class="col-sm-4 control-label">
								回复人
							</label>
							<div class="col-sm-8">
								<input class="form-control" id="" type="text" disabled="disabled"  name="rpname"value="<?php echo $rs['sender']?>">
							</div>
						</div>
						
							<div class="form-group">
							<label for="lastname" class="col-sm-4 control-label">回复内容</label>
							<div class="col-sm-8">
								<textarea class="form-control" row = "100"  disabled="disabled" cols = "30" style="height:120px;width:360px;"><?php echo $rs['content'] ?></textarea>
							</div>
						</div>

						<div class="form-group">
							<label for="inputPassword" class="col-sm-4 control-label">
								回复者
							</label>
							<div class="col-sm-8">
								<input class="form-control" id="" type="text" disabled="disabled" name = "sender" value="<?php echo $_SESSION['name']?>">
							</div>

						</div>
						<div class="form-group">
							<label for="inputPassword" class="col-sm-4 control-label">
								回复者账号
							</label>
							<div class="col-sm-8">
								<input class="form-control" id="" type="text"  disabled="disabled" name = "username" value="<?php
								echo $_SESSION['username']?>">
							</div>
						</div>

						<div class="form-group">
							<label for="firstname" class="col-sm-4 control-label">
								回复标题
							</label>
							<div class="col-sm-8">
								<input  class="form-control" id="" 
									   placeholder="" type="text" name= "title">
							</div>
						</div>
						<div class="form-group">
							<label for="lastname" class="col-sm-4 control-label">回复内容</label>
							<div class="col-sm-8">
								<textarea class="form-control" name = "content"  row = "100"  cols = "30" style="height:120px;width:360px;"></textarea>
							</div>
						</div>
				
						<div class="form-group">
							<div class="col-sm-offset-6 col-sm-6">
								<button type="submit" id="submit" class="btn btn-default">回复</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<button type="reset" id="button" name="button" class="btn btn-default">重置</button>
							</div>
						</div>
					</form>
				</div>			
			</div>
	</div>
			
		</div>

</body>
</html>

