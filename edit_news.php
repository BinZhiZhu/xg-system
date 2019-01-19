<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>公告信息管理</title>
	 <link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="kd_html/themes/default/default.css" />
		<script charset="utf-8" src="kd_html/kindeditor.js"></script>
		<script charset="utf-8" src="kd_html/lang/zh_CN.js"></script>
		<?php 
		require 'conn.php';
            $id=intval($_GET['id']);
            $sql=mysqli_query($conn,"select * from news where id='$id'");
            $rs=mysqli_fetch_array($sql);
		 ?>
</head>
<body>
<center>
<h2 class="page-header" style="font-size:20px;">修改新闻公告</h2>
<form method="post" action="action.php?action=update_news"> 
<table>
<tr>
<td align="right">标题：</td>
	<input type='hidden' name='id' value="<?php echo $rs['id']?>">
<td><input type="text" id="title" name="title" size="88" value="<?php echo $rs['title']?>"></td>
</tr>
<tr>
<td align="right">内容：</td>
<td><textarea id="content" name="content" style="width:500px;height:300px;"><?php echo $rs['content']?></textarea>
</td>
</tr>
</table>
<input type="submit" name="submit" style="float:left;margin-left:550px;margin-top:10px;">
</form>
<script>
		  //设置参数
		  var options = {
		    allowFileManager : true,
		    newlineTag : 'br'
		  };
		  KindEditor.ready(function(K) {
		    //如需创建多个编辑器：
		    //1.添加一个文本区域
		    //2.只要复制多下面这行代码"K.create('textarea[name="content"]',options);"
		    //3.然后改一下文本区域的名字
		    K.create('textarea[name="content"]',options);
		    // K.create('textarea[name="f_body"]',options);
		  });
		</script>
</center>
</body>
</html>