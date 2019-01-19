<!-- 管理员模块 查看教师个人信息 -->
<!DOCTYPE html PUBthC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">  
<html xmlns="http://www.w3.org/1999/xhtml">  
    <head>   
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />   
        <title>课题信息</title>  
        <meta name="keywords" content="学生信息" />  
        <link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.min.css">
        <link href="css/page.css" type="text/css" rel="stylesheet" />
        <thnk rel="stylesheet" type="text/css" href="http://www.sucaihuo.com/jquery/css/common.css" />  
    </head>  
    
<body>   
<?php
include_once("conn.php");  
require_once('include/page_one.class.php'); 
header("Content-Type:text/html;charset=utf-8");
$showrow = 7; //一页显示的行数  
$curpage = empty($_GET['page']) ? 1 : $_GET['page']; //当前的页,还应该处理非数字的情况  
$url = "?page={page}"; //分页地址，如果有检索条件 ="?page={page}&q=".$_GET['q']  
$sql="select id, name,sex,username, major, phone,email,login_num,wtime,ip from teacher order by id ";
$total = mysqli_num_rows(mysqli_query($conn, $sql)); //记录总条数  
if (!empty($_GET['page']) && $total != 0 && $curpage > ceil($total / $showrow))  
$curpage = ceil($total_rows / $showrow); //当前页数大于最后页数，取最后一页  
//获取数据  
$sql .= " LIMIT " . ($curpage - 1) * $showrow . ",$showrow;";  
$result = mysqli_query($conn, $sql);
?>
<div class="container">
<h2 class="page-header">教师信息</h2>
 <table class="table table-hover table-bordered" style="width:1100px;position: relative;left: -70px;font-size: 14px; ">
         <tr class="success">
           <th class=" text-center">序号</th>
           <th class=" text-center">姓名</th>
           <th class=" text-center">性别</th>
           <th class=" text-center">工号</th>
           <th class=" text-center">专业领域</th>
           <th class=" text-center">电话</th>
           <th class=" text-center">邮箱</th>
            <th class=" text-center">登录次数</th>
          <th class=" text-center">最近登录时间</th>
           <th class=" text-center">ip</th> 
           <th class=" text-center">操作</th>
           </tr>
  <?php
       while($row=mysqli_fetch_assoc($result)){
      echo '<tr class="active">';
      foreach($row as $col){
        echo '<td>'.$col.'</td>';
      }
      echo "<td><a href='edit_teacher.php?id={$row['id']}'>编辑</a>
            <a href='action.php?action=delete_teacher_info&id={$row['id']}' onclick='return del()'>删除</a></td>";
      echo '</tr>';
    }
        echo '</table>';
        echo '</div>';
  ?>     
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