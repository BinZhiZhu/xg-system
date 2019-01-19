<html> 
<head> 
<title>文件上传实例</title> 
<meta charset="utf-8">
</head> 
<body> 
<div>
<form method="post" action="action_info.php?action=add_file" enctype="multipart/form-data"> 
<table width="48%" height="93" border="0"  align=center cellpadding="0" cellspacing="0"> 
<tr> 
<td>标题：</td> 
<td><input name="title" type="text" id="title"></td> 
</tr> 
<tr> 
<td>文件： </td> 
<td><label> 
<input name="file" type="file" value="浏览" > 
<!-- <input type="hidden" name="MAX_FILE_SIZE" value="2000000">  -->
</label></td> 
</tr> 
<tr> 
<td> </td> 
<td><input type="submit" value="上 传" name="upload"></td> 
</tr> 
</table></td> 
</tr> 
</table> 
</form> 

</body> 
</html> 