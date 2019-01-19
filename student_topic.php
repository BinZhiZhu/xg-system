<!-- 管理员查看学生选题情况 -->
<!DOCTYPE html PUBthC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">  
<html xmlns="http://www.w3.org/1999/xhtml">  
    <head>   
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />   
        <title>课题信息</title>  
        <meta name="keywords" content="课题信息" />   
       <link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.min.css">
        <link href="css/page.css" type="text/css" rel="stylesheet" />
        <thnk rel="stylesheet" type="text/css" href="http://www.sucaihuo.com/jquery/css/common.css" />
            <link href="css/search.css" type="text/css" rel="stylesheet" />
    </head>  
    <body>  
<form action="search_stutopic.php" method="get" class="form" >
<select name="keywords" id="keywords">
<option value="">选择专业</option>
<?php
          require 'conn.php';
          $sql= mysqli_query($conn,"select * from major");
          while($row = mysqli_fetch_array($sql))
            {
              echo "<option value='$row[major_name]'>$row[major_name]</option>";//循环，拼凑下拉框选项
            } 
          ?>
<option value="keywords"></option>
</select>
<input type="submit" name="submit" value="查询" />
    </form>
    <form action="search_stutopic.php" method="get">
    <p><input type="text" class="textbox" name="keywords" placeholder="请输入关键字" ></p>
    <p><input type="submit" class="submit" value="查询"></p>
    </form>
    <?php
    include_once("conn.php");  
    require_once('include/page_one.class.php'); //分页类  
    $showrow = 8; //一页显示的行数  
    $curpage = empty($_GET['page']) ? 1 : $_GET['page']; //当前的页,还应该处理非数字的情况  
    $url = "?page={page}"; //分页地址，如果有检索条件 ="?page={page}&q=".$_GET['q']  
   $sql = "select id,username,name,topic_id,topic_name,class,topic_type,will,status from topics_stu  ";
    $total = mysqli_num_rows(mysqli_query($conn, $sql)); //记录总条数  
    if (!empty($_GET['page']) && $total != 0 && $curpage > ceil($total / $showrow))  
        $curpage = ceil($total_rows / $showrow); //当前页数大于最后页数，取最后一页  
    //获取数据  
    $sql .= " LIMIT " . ($curpage - 1) * $showrow . ",$showrow;";  
    $query = mysqli_query($conn, $sql);
    if ($sql&&mysqli_num_rows($query)){
      ?>
   <table class="table table-hover table-bordered">
   <tr class="success mx-0">
              <th>序号</th>
							<th>学生编号</th>
							<th>学生姓名</th>
              <th>课题编号</th>
              <th>课题名称</th>
							<th>课题专业</th>
							<th>课题类型</th>
							<th>所选志愿</th>
							<th>审核状态</th>
             </tr>
  <?php
    while($row = mysqli_fetch_assoc($query)){
            echo '<tr class="active">';
            foreach($row as $col){
                echo '<td>'.$col.'</td>';
            }         
            echo '</tr>';   
        }
        echo '</table>';
    }else{
      echo '<div id="none">很抱歉，暂时没有相关的课题信息</div>';
    }
  
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
