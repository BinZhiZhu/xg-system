<?php include 'include/common.func.php'; ?>
<!DOCTYPE html>
<html lang="en">
<script>
  function del(){ 
  if(!confirm("确认要删除？")){ 
  window.event.returnValue = false; 
  } 
  } 
</script>
<head>
	<meta charset="UTF-8">
	<title>留言管理</title>
      <link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.min.css">
        <link href="css/page.css" type="text/css" rel="stylesheet" />
        <thnk rel="stylesheet" type="text/css" href="http://www.sucaihuo.com/jquery/css/common.css" />
</head>
<body>
<h2 class="page-header" style="font-size:20px;">留言管理</h2>
<?php
require 'conn.php';
require_once('include/page_one.class.php');  
    $showrow =10; //一页显示的行数  
    $curpage = empty($_GET['page']) ? 1 : $_GET['page']; //当前的页,还应该处理非数字的情况  
    $url = "?page={page}"; //分页地址，如果有检索条件 ="?page={page}&q=".$_GET['q']  
   $sql = "select * from message";
    $total = mysqli_num_rows(mysqli_query($conn, $sql)); //记录总条数  
    if (!empty($_GET['page']) && $total != 0 && $curpage > ceil($total / $showrow))  
        $curpage = ceil($total_rows / $showrow); //当前页数大于最后页数，取最后一页  
    //获取数据  
   $sql .= " LIMIT " . ($curpage - 1) * $showrow . ",$showrow;"; 
    $query = mysqli_query($conn, $sql);
if ($sql && mysqli_num_rows($query)) {
  ?>
<table class="table table-hover table-bordered">
    <tr class="success mx-0">
      <th class=" text-center">序号</th>
      <th class=" text-center">发送人账号</th>
      <th class=" text-center">发送人</th>
      <th class=" text-center">接收人账号</th>
      <th class=" text-center">标题</th>
      <th class=" text-center">内容</th>
      <th class=" text-center">留言时间</th>
      <th class=" text-center">操作</th>
      </tr>
<?php
	while ($row=mysqli_fetch_assoc($query)) {
		   echo '<tr class="active">';
		   foreach ($row as $col) {
		   	  echo '<td>'.$col.'</td>';
		   }
		   echo "<td><a href='action_words.php?action=del_adminmessage&id=$row[id]' onclick='return del()'>删除</a></td>";
		   echo '</tr>';

	}
}else{
	echo '<div align="center" style="color:red">当前没有留言！</div>';
}
?>

 <div class="page" style="position:absolute;top:500px;left:400px;">
    <?php
     if ($total > $showrow) {//总记录数大于每页显示数，显示分页  
    $page = new page($total, $showrow, $curpage, $url, 2);  
    echo $page->myde_write();  
    } 
    ?>
    </div>
</body>
</html>