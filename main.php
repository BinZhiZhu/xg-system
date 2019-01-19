<?php 
require 'conn.php';
include 'include/common.func.php';
chklogin();
 ?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>主要内容区main</title>
<link href="css/css.css" type="text/css" rel="stylesheet" />
<link href="css/main.css" type="text/css" rel="stylesheet" />
<link rel="shortcut icon" href="images/main/favicon.ico" />
</head>
<body>
<!--main_top-->
<div class="div1">

<table width="99%" border="0" cellspacing="0" cellpadding="0" id="main">
  <tr>
    <td colspan="2" align="left" valign="top">
    <span class="time"><strong>您好！<?php echo $_SESSION['name']?></strong><u>[<?php echo $_SESSION['username'] ?>]</u></span>

    <div class="top"><span class="left">您上次的登灵时间：<?php echo $_SESSION['wtime']?>  登录IP：<?php echo $_SESSION['ip']?> &nbsp;&nbsp;&nbsp;&nbsp;如非您本人操作，请及时</span>更改密码</div>
    <div class="sec">这是您第<span class="num"><?php echo $_SESSION['login_num']?></span>次,登录！</div>
      <hr width="90%">
    </td>
  </tr>
  <tr>
    <td align="left" valign="top" width="50%" >
    <div class="news">
    <div class="title"><b>系统公告</b><a href="" style="float:right">+更多</a></div>
    <ul>
<?php 
$sql=mysqli_query($conn,"select * from news order by id desc limit 6");
     while ($row=mysqli_fetch_array($sql)) {
 ?>
 <li><span style="float:right;padding-top:3px;"><?php echo $row['wtime'] ?></span><a href="news_show.php?id=<?php echo $row['id'] ?>"><?php echo $row['title'] ?></a></li>


<?php 
}
?>
</ul>	
    </div>
    </td>
    <td align="left" valign="top" width="49%" >
<div class="text">
<div class="header">
   <a href="" style="float:right;">+更多</a>
              <b>资料下载</b>
</div>
<ul>
<?php 
$sql=mysqli_query($conn,"select * from upload order by uploadid desc limit 6");
while ($row=mysqli_fetch_array($sql)) {
?>
<li><span style="float:right;">2018-1-10</span><a href="<?php echo $row['pic'] ?>"><?php echo $row['title'] ?></a></li>
<?php
}
 ?>
</ul>
</div>
    </td>
  </tr>
  <tr>
    <td colspan="2" align="left" valign="top">
    <div class="main-corpy">系统提示</div>
    <div class="main-order">1=>若遇到相关问题，请联系学校教务处TEL：xxx-xxxxxxxxx<br/>
2=>强烈建议您将IE7以上版本或其他的浏览器</div>
    </td>
  </tr>
</table>
</div>
</body>
</html>