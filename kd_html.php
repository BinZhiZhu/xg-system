<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="kd_html/themes/default/default.css" />
		<script charset="utf-8" src="kd_html/kindeditor.js"></script>
		<script charset="utf-8" src="kd_html/lang/zh_CN.js"></script>
</head>
<body>

<div class="content">
            <textarea id="z_body" name="z_body"
                style="width:500px;height:300px;">在这里输入内容...</textarea>
        </div>
	<script>
		  //设置参数
		  var options = {
		    allowFileManager : true,
		    newlineTag : 'br'
		  };
		  KindEditor.ready(function(K) {
		    //如需创建多个编辑器：
		    //1.添加一个文本区域
		    //2.只要复制多下面这行代码"K.create('textarea[name="z_body"]',options);"
		    //3.然后改一下文本区域的名字
		    K.create('textarea[name="z_body"]',options);
		    // K.create('textarea[name="f_body"]',options);
		  });
		</script>
		
</body>
</html>