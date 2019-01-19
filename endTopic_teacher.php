<!-- 审核员模块：已经审核的课题列表 -->
<html>
<head>
	<meta charset="UTF-8">
	<title>课题审核</title>
 <link href="css/page.css" type="text/css" rel="stylesheet" /> 
<link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.min.css">
  <thnk rel="stylesheet" type="text/css" href="http://www.sucaihuo.com/jquery/css/common.css" />
</head>
<body>
<h2 class="page-header" style="font-size:20px;text-align:center">已审核的课题信息</h2>
<table class="table table-hover table-bordered">
<tr class="success mx-0">
<style>
th{
  text-align: center;
}
</style>
 <th>序号</th>
 <th>课题编号</th>
 <th>课题名称</th>
 <th>学生姓名</th>
 <th>学生编号</th>
 <th>课题专业</th>
 <th>课题类型</th>
 <th>所选志愿</th>
 <th>审核状态</th>
</tr>
<?php
   require 'conn.php';
   require_once('include/page_one.class.php'); //分页类  
   session_start();
   $username=$_SESSION['username'];
    $showrow = 13; //一页显示的行数  
    $curpage = empty($_GET['page']) ? 1 : $_GET['page']; //当前的页,还应该处理非数字的情况  
    $url = "?page={page}"; //分页地址，如果有检索条件 ="?page={page}&q=".$_GET['q']  
    $sql = "select id,topic_id,topic_name,name,username,class,topic_type,will,status from topics_stu where teacher_id='$username'";
    $total = mysqli_num_rows(mysqli_query($conn, $sql)); //记录总条数  
    if (!empty($_GET['page']) && $total != 0 && $curpage > ceil($total / $showrow))  
        $curpage = ceil($total_rows / $showrow); //当前页数大于最后页数，取最后一页  
    //获取数据  
    $sql .= " LIMIT " . ($curpage - 1) * $showrow . ",$showrow;";  
    $query = mysqli_query($conn, $sql);
while ($row=mysqli_fetch_assoc($query)) {
	echo '<tr class="active">';
	foreach ($row as $col) {
		echo '<td>'.$col.'</td>';
	}
	echo '</tr>';
}

?>
</table>
<div id="showpage">
    <?php
     if ($total > $showrow) {//总记录数大于每页显示数，显示分页  
    $page = new page($total, $showrow, $curpage, $url, 2);  
    echo $page->myde_write();  
    } 
    ?>
    </div>
</body>
</html>