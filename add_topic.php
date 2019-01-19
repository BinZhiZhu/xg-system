<!-- 教师模块：教师申请课题 -->
<?php 
require 'include/common.func.php';
 checklogin();
 ?>
<html>
<head>
<meta charset="UTF-8">
	<title>课题添加</title>
    <link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.min.css" />
  <link rel="stylesheet" href="kd_html/themes/default/default.css" />
    <script charset="utf-8" src="kd_html/kindeditor.js"></script>
    <script charset="utf-8" src="kd_html/lang/zh_CN.js"></script>
</head>
<body>
<?php
   require 'conn.php';
   $username=$_SESSION['username'];
   $sql=mysqli_query($conn,"select name from teacher where username='$username'");
   $teacher_name=mysqli_fetch_assoc($sql);
?>
<center>	
<h2 class="page-header" style="font-size:20px;">课题信息录入</h2>
<form method="post" name="Form" id="Form" action="action_topic.php?action=add_topic" >
<table width="800" border="0" cellspacing="0">
 <tr>
  <td align="right">课题编号:</td>
  <td><input type="text" name="topic_id" > <td>
 </tr>
 
 <tr>
  <td align="right">课题名称:</td>
  <td><input type="text" name="topic_name"  ></td>
 </tr>


  <tr>
     <td align="right">课题类型:</td>
     <td><select name="topic_type" id="topic_type" >
     <option value="0">请选择</option>
      <option value="软件">软件</option>
      <option value="手机APP">手机APP</option>
       <option value="网站系统">网站系统</option>
      <option value="学术论文">学术论文</option>
      <option value="嵌入式开发">嵌入式开发</option>
      <option value="硬件">硬件</option>
      <option value="网络攻防">网络攻防</option>
      <option value="网络安全">网络安全</option>
      <option value="其他">其他</option>
     </select> </td> 
  </tr>

  <tr>
  <td align="right">教师编号:</td>
  <td><input type="text" name="teacher_id"  disabled="disabled" value="<?php echo $username?>"></td>
  </tr>

    <tr>
  <td align="right">教师姓名:</td>
  <td><input type="text" name="teacher_name"  disabled="disabled" value="<?php echo $teacher_name['name'];?>"></td>
  </tr>

  <tr>
    <td align="right">课题专业:</td>
     <td><select name="class" id="class" >
       <option value="0">请选择</option>
      <option value="计算机科学与技术（数字媒体）">计算机科学与技术（数字媒体）</option>
      <option value="计算机科学与技术（数据库）">计算机科学与技术（数据库）</option>
       <option value="计算机科学与技术（Oracle）">计算机科学与技术（Oracle）</option>
      <option value="电子信息工程">电子信息工程</option>
      <option value="电气及其自动化">电气及其自动化</option>
      <option value="电子信息管理">电子信息管理</option>
      <option value="电子商务">电子商务</option>
      <option value="网络工程">网络工程</option>

     </select> </td> 
  </tr>

  <tr>
    <td align="right">允许人数:</td>
    <td><select name="total_stu" id="total_stu"  >
       <option value="0">请选择</option>
      <option value="1">1</option>
      <option value="2">2</option>
       <option value="3">3</option>
      <option value="4">4</option>
      <option value="5">5</option>
      <option value="6">6</option>
      <option value="7">7</option>
      <option value="8">8</option>
      <option value="9">9</option>
       <option value="10">10</option>
     </select></td>
  </tr>
<tr>
<td align="right">课题介绍：</td>
<td><textarea id="content" name="content" form="Form" style="width:400px;height:300px;" >在这里输入内容...</textarea>
</td>
</tr>
<tr>
    <td align="right" style="position:relative;left:255px;"><input type="submit"  id="submit" value="录入" style="width:50px" > </td>
    <td style="position:relative;left:255px;"><input type="reset"  id="button" name="button" value="重置" style="width:50px" >   </td>
  </tr>  
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
</form>
</table>
</center>
</body>
</html>


