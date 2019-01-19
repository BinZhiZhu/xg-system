<!-- 留言板 -->	
<?php include 'include/common.func.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title>留言板系统</title>
	<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<style>
	    body{
	    	background-color:#fff2fb;
	    }
	    header{
		font-size: 20px;
		margin-top:20px;
		}
		a{
			margin-left: 20px; 
			text-decoration: none; 
		}
		a:hover{
			color: brown;
		}

		.DIV{border: 1px solid gray;}
		span{font-weight: bold;}
		.div-reply{background-color:blanchedalmond ;width: 97%; height: 40px;margin-left: 15px;margin-top: -8px;margin-bottom: 10px;}
		
		.del{
			float: right;
			margin-top: 7px;
			margin-right: 20px;
		}
		.reply{
			float: right;
			margin-top: 7px;
			margin-right: 10px;
		}
		 .area{
			width: 97%;
			height: 100px;
			
			margin-left: 15px;
			margin-bottom: 0px;
			display:none;
			
		}
		.area textarea{
			width: 100%;
			height: 60px;
		}
		#userid{
			float: right;
			margin-right:10px; 
			font-size: 15px;
			color: red;
		}
		#selfinfo{
			float: right;
			margin-right:20px; 
		}
		#header{
			width: 100%;
			height: 50px;
			border-bottom: 1px solid red;
		}
		#pwd{
			float: right;
		}

	</style>
<script>
   function del(){ 
  if(!confirm("确认要删除？")){ 
  window.event.returnValue = false; 
  } 
</script>
</head>
<body>
<div class="container">
	<br />
	<br />
	<!--/////////////////////////导航项目///////////////////////////////////-->
	<ul id="myTab" class="nav nav-tabs">
		<li class="active"><a href="#look" data-toggle="tab">全部留言</a></li>
		<li ><a href="#add" data-toggle="tab">添加留言</a></li>
		<li><a href="#mine" data-toggle="tab">我的留言</a></li>
		<li><a href="#receive" data-toggle="tab">我收到的留言</a></li>
		<li><a href="#reply" data-toggle="tab">我回复的留言</a></li>
		<li><a href="#rp" data-toggle="tab">我收到的回复</a></li>
	</ul>

<!--//////////////////////////////导航内容////////////////////////////////////-->	
	<div id="myTabContent" class="tab-content">
		<div class="tab-pane fade" id="add">
	    <br /><br />
	    <?php
	      require ('conn.php');
          $table='';
	      session_start();
	      //role_id 判断登录身份，查询相对应的表
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
	        $username=$_SESSION['username'];
			$result=mysqli_query($conn,"select username,name from $table where username='$username'");
			$rows=mysqli_fetch_assoc($result);
	?>
	<!-- 添加留言部分 -->
		<div class="row">
				<div class="col-sm-6 col-sm-offset-2">
					<form class="form-horizontal" role="form" method="post" action="action_words.php?action=add_message_stu">
						<div class="form-group">
							<label for="inputPassword" class="col-sm-4 control-label">
								接收人账号
							</label>
							<div class="col-sm-8">
								<input class="form-control" id="" type="text" name = "sendee">								
							</div>
						</div>
						
						<div class="form-group">
							<label for="inputPassword" class="col-sm-4 control-label">
								留言者
							</label>
							<div class="col-sm-8">
								<input class="form-control" id="" type="text" disabled="disabled" name = "sender" value="<?php echo $rows['name']?>">
							</div>

						</div>
						<div class="form-group">
							<label for="inputPassword" class="col-sm-4 control-label">
								学号
							</label>
							<div class="col-sm-8">
								<input class="form-control" id="" type="text"  disabled="disabled" name = "username" value="<?php
								echo $rows['username']?>">
							</div>
						</div>

						<div class="form-group">
							<label for="firstname" class="col-sm-4 control-label">
								标题
							</label>
							<div class="col-sm-8">
								<input  class="form-control" id="" 
									   placeholder="" type="text" name = "title">
							</div>
						</div>
						<div class="form-group">
							<label for="lastname" class="col-sm-4 control-label">留言内容</label>
							<div class="col-sm-8">
								<textarea class="form-control" name = "content"  row = "100"  cols = "30" style="height:120px;width:360px;"></textarea>
							</div>
						</div>
				
						<div class="form-group">
							<div class="col-sm-offset-6 col-sm-6">
								<button type="submit" id="submit" class="btn btn-default">留言</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<button type="reset" id="button" name="button" class="btn btn-default">重置</button>
							</div>
						</div>
					</form>
				</div>			
			</div>
	</div>
	
	
	<!--//////////////////导航内容////////////////////////-->
	<div class="tab-pane fade in active" id="look">	<br />
		<?php  
         $sql= mysqli_query($conn,"SELECT * FROM message order by id desc "); 
         while ($row=mysqli_fetch_assoc($sql)) {
?> 
		<div class="DIV">
			<h5 class="page-header" style="margin-top: 10px;margin-left: 15px;font-weight: bold;">留言者：<?php echo $row['sender']?><span style="float:right"><?php echo $row['date'];?></span></h5>
			
			<h6 class="page-header" style="margin-left: 15px;margin-top: -5px;">
				<span>[标题：<?php echo getstr($row['title'],10)?>]</span><?php echo getstr($row['content'],100);?>&nbsp;
			</h6>
		</div>
<?php
}
 ?>
	</div>
	
	<!--//////////////////导航内容////////////////////////-->
	<div class="tab-pane fade" id="mine">	<br />
		<?php  
         $sql= mysqli_query($conn,"SELECT * FROM message where username='$username' order by id desc  "); 
         if($sql && mysqli_num_rows($sql)>0){
         	 while ($rs=mysqli_fetch_assoc($sql)) {
?>   
		<div class="DIV">
			<a href="action_words.php?action=del_message&id=<?php echo $rs['id']?>" onclick="return del()" class="del">删除</a>
			<h5 class="page-header" style="margin-top: 10px;margin-left: 15px;font-weight: bold;">留言者：<?php echo $rs['sender']?></h5>			
			<h6 class="page-header" style="margin-left: 15px;margin-top: -5px;">
				<span>[标题：<?php echo getstr($rs['title'],10)?>]</span>&nbsp;&nbsp;<?php echo getstr($rs['content'],100)?>&nbsp;<span style="float:right"><?php echo $rs['date']?></span>
			</h6>
		</div>
			<?php

  }
}else{
             echo "当前没有留言,请添加留言~</a>";
}
?>
	</div>

	<!--//////////////////导航内容////////////////////////-->
	<div class="tab-pane fade" id="receive">	<br />
		<?php  
         $sql= mysqli_query($conn,"SELECT * FROM message where sendee='$username' order by id desc");
         if ($sql&& mysqli_num_rows($sql)>0) {
    while ($result=mysqli_fetch_assoc($sql)) {
?>      
		<div class="DIV">
				<a href="action_words.php?action=del_message&id=<?php echo $result['id']?>" onclick="return del()" class="del">删除</a>
	         <a href="reply.php?id=<?php echo $result['id']?>" class="del">回复</a>
			<h5 class="page-header" style="margin-top: 10px;margin-left: 15px;font-weight: bold;">留言者：<?php echo $result['sender']?></h5>			
			<h6 class="page-header" style="margin-left: 15px;margin-top: -5px;">
				<span>[<?php echo getstr($result['title'],10)?>]</span>&nbsp;&nbsp;<?php echo getstr($result['content'],100)?>&nbsp;<span style="float:right"><?php echo $result['date']?></span>
			</h6>
		</div>
<?php

}
}else{
	 echo '当前没有收到的留言哦~';
}
?>
</div>

<div class="tab-pane fade" id="reply">	<br />
		<?php  
         $sql= mysqli_query($conn,"SELECT * FROM reply where username='$_SESSION[username]' order by id desc ");
         if ($sql&& mysqli_num_rows($sql)>0) {
    while ($reply=mysqli_fetch_assoc($sql)) {
?>      
		<div class="DIV">
				<a href="action_words.php?action=del_reply&id=<?php echo $reply['id']?>" onclick="return del()" class="del">删除</a>
			<h5 class="page-header" style="margin-top: 10px;margin-left: 15px;font-weight: bold;">回复：<?php echo $reply['rpname']?></h5>			
			<h6 class="page-header" style="margin-left: 15px;margin-top: -5px;">
				<span>[标题：<?php echo getstr($reply['title'],10)?>]</span>&nbsp;&nbsp;<?php echo getstr($reply['content'],100)?>&nbsp;<span style="float:right"><?php echo $reply['date']?></span>
			</h6>
		</div>
<?php

}
}else{
	 echo '当前没有回复的留言哦~';
}
?>
</div>

<div class="tab-pane fade" id="rp">	<br />
		<?php  
         $sql= mysqli_query($conn,"SELECT * FROM reply where sendee='$_SESSION[username]' order by id desc ");
         if ($sql&& mysqli_num_rows($sql)>0) {
    while ($rp=mysqli_fetch_assoc($sql)) {
?>      
		<div class="DIV">
				<a href="action_words.php?action=del_reply&id=<?php echo $rp['id']?>" onclick="return del()" class="del">删除</a>
				 <a href="rp.php?id=<?php echo $rp['id']?>" class="del">回复</a>
			<h5 class="page-header" style="margin-top: 10px;margin-left: 15px;font-weight: bold;">回复者：<?php echo $rp['sender']?></h5>			
			<h6 class="page-header" style="margin-left: 15px;margin-top: -5px;">
				<span>[标题：<?php echo getstr($rp['title'],10)?>]</span>&nbsp;&nbsp;<?php echo getstr($rp['content'],100)?>&nbsp;<span style="float:right"><?php echo $rp['date']?></span>
			</h6>
		</div>
<?php

}
}else{
	 echo '当前没有收到的回复哦~';
}
?>
</div>

</div>
</div>
</body>
</html>