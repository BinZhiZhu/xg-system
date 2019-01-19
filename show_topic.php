<!-- 学生查看课题信息 改页面的课题是已经审核成功的课题 -->
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
<form action="search_topic.php" method="get" class="form" >
<select name="keywords" id="keywords">
<option value="">选择专业</option>
<option value="计算机科学与技术">计算机科学与技术</option>
<option value="计算机科学与技术(数字媒体)">计算机科学与技术(数字媒体)</option>
<option value="信息管理">信息管理</option>
<option value="电子信息工程">电子信息工程</option>
<option value="电子商务">电子商务</option>
<option value="网络工程">网络工程</option>
<option value="电气及其自动化">电气及其自动化</option>
</select>
<input type="submit" name="submit" value="查询" />
    </form>
    <center>
    <form action="search_topic.php" method="get">
    <p><input type="text" class="textbox" name="keywords" placeholder="请输入关键字" ></p>
    <p><input type="submit" class="submit" value="查询"></p>  
    </form>
    <?php
    include_once("conn.php");  
    require_once('include/page_one.class.php'); //分页类  
    $showrow = 10; //一页显示的行数  
    $curpage = empty($_GET['page']) ? 1 : $_GET['page']; //当前的页,还应该处理非数字的情况  
    $url = "?page={page}"; //分页地址，如果有检索条件 ="?page={page}&q=".$_GET['q']  
    $sql = "select id,topic_id,topic_name,teacher_id,teacher_name,class,topic_type,total_stu from topics where status='通过'";
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
               <th>课题编号</th>
               <th>课题名称</th>
               <th>教师编号</th>
               <th>教师姓名</th>
               <th>专业</th>
               <th>课题类型</th>
               <th>允许人数</th>
               <th>选择志愿</th>
               <th>课题介绍</th>
               <th>操作</th>
             </tr>
  <?php
    while($row = mysqli_fetch_assoc($query)){
            echo '<tr class="active">';
            foreach($row as $col){
                echo '<td>'.$col.'</td>';
            }
?>
          <form action='action_topic.php?action=choose_topic&id=<?php echo $row['id'] ?>' method='post'>
           <td><select name="will">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            </select></td>
          <td><a href='topic_show.php?id=<?php echo $row['id'] ?>'>详情</a></td>
           <td><input type="submit" value="选择" /></td>
            </form> 
        </tr>
    <?php
    }
  ?>
     </table>
    <?php
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
