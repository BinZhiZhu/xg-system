<html>
<head>
	<meta charset="UTF-8">
	<title>选题系统登录界面</title>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="css/Login.css"/>
<script type="text/javascript" src="bootstrap-3.3.7-dist/js/bootstrap.js"></script>
<script type="text/javascript" src="bootstrap-3.3.7-dist/js/jquery-3.2.1.min.js"></script>
</head>
<body id="bgcolor"  >	
	<div id="marquee">		
	<marquee behavior="marquee" direction="right" scrollamount="10" scrolldelay="100">公告：初始密码<123456>,登入系统后请更改密码！</marquee>
	</div>	
<div class="container">
	<div id="header"><br>
		<img src="images/login_earth.png"/>
		<span class="span1">华南农业大学珠江学院</span><br /><span class="span2">信息工程学院毕业论文选题系统</span>
	</div>	
	<div class="col-md-4 pull-right">
		<!--<h3 class="page-header" style="margin: 10px auto;font-size:25px;color:black;font-family:隶书">用户登录</h3>-->
		<form action="Log.php" method="post" style="margin:15px ;">
		<div style="margin-bottom: 8px;">
			<label for="role">用户身份：&nbsp&nbsp</label>
			<select name="role" style="width:180px;height: 25px;" class=""> 
		        <option value="0">学生</option> 
		        <option value="1">教师</option>
		        <option value="2">审核员</option>
		        <option value="3">管理员</option>
	        </select>
		</div>
		<div class="form-group">
			<label for="username">用户账号：&nbsp&nbsp</label>
			<input type="text" value="" class="//form-control" id="username" name="username" placeholder="请输入用户名" maxlength="18" style="width: 180px;"/>
		</div>
		<div class="form-group">
			<label for="password">用户密码：&nbsp&nbsp</label>
			<input type="password" id="password" name="password" class=""placeholder="请输入密码" style="width: 180px;"/>
		</div>
		<div class="form-group" style="margin-top: 10px;">
			<label for="authcode">验证码&nbsp&nbsp&nbsp&nbsp：&nbsp&nbsp</label>
			<input type="text" name="authcode"  size="10" placeholder="验证码" maxlength="4" class="" style="width: 80px;"/>
			<img id="captcha_img" border='1' src='include/captcha.php?r=echo rand(); ?>' style="width:100px; height:30px" />
       		 	<a href="javascript:void(0)" onclick="document.getElementById('captcha_img').src='include/captcha.php? r='+Math.random()">&nbsp<span style="color: white;" class="glyphicon glyphicon-repeat"></span></a>
		</div>
		<div class="form-group">
			<input type="submit" id="submit" name="" id="" value="登录" class="btn btn-primary" style="border: 1px solid #8A8A8A;background: -webkit-linear-gradient(#BDC4D8, #0C0E1E); /* Safari 5.1 - 6.0 */
   												 																				background: -o-linear-gradient(#BDC4D8, #0C0E1E); /* Opera 11.1 - 12.0 */
   													 																			background: -moz-linear-gradient(#BDC4D8, #0C0E1E); /* Firefox 3.6 - 15 */
   															 																	background: linear-gradient(#BDC4D8, #0C0E1E); /* 标准的语法（必须放在最后） */
			"/>
			<input type="reset" id="button" name="" id="" value="重置" class="btn btn-primary" style="margin-left: 28px; border: 1px solid #8A8A8A;background: -webkit-linear-gradient(#BDC4D8, #0C0E1E); /* Safari 5.1 - 6.0 */
   																															   background: -o-linear-gradient(#BDC4D8, #0C0E1E); /* Opera 11.1 - 12.0 */
    																													  	   background: -moz-linear-gradient(#BDC4D8, #0C0E1E); /* Firefox 3.6 - 15 */
   																															   background: linear-gradient(#BDC4D8, #0C0E1E); /* 标准的语法（必须放在最后） */
"/>
		</div>	
		</form>
	</div>
</div>
<div id="footer">
<p align="center">COPYRIGHT 2017 &copy; 华南农业大学珠江学院信息工程学院 版权所有 </p>
</div> 
</body>
</html>

