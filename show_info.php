<!-- 管理员模块  查看全部用户列表 -->
<!DOCTYPE html PUBthC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">  
<html xmlns="http://www.w3.org/1999/xhtml">  
    <head>   
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />   
        <title>课题信息</title>  
        <meta name="keywords" content="学生信息" />  
        <link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.min.css">
        <link href="css/page.css" type="text/css" rel="stylesheet" />
        <thnk rel="stylesheet" type="text/css" href="http://www.sucaihuo.com/jquery/css/common.css" />
           <link href="css/search.css" type="text/css" rel="stylesheet" />
        <script type="text/javascript">
    function xuanzhong()
    {
        //取全选按钮的选中状态
        var zt = document.getElementById("qx").checked;
        
        //让下面所有的checkbox选中状态改变
        var ck = document.getElementsByClassName("ck");
        
        for(var i=0;i<ck.length;i++)
        {
            if(zt)
            {
                ck[i].setAttribute("checked","checked");
            }
            else
            {
                ck[i].removeAttribute("checked");
            }
        }
    }
    
    function tishi()
    {
        //找所有选中项
        var ck = document.getElementsByClassName("ck");
        
        var str = "";
        
        for(var i=0;i<ck.length;i++)
        {
            if(ck[i].checked)
            {
                str += ck[i].value+",";
            }
        }
        
        return confirm("确定要删除以下数据么："+str+"");
    }

      function del(){ 
  if(!confirm("确认要删除？")){ 
  window.event.returnValue = false; 
  } 
  } 
</script> 
    </head>  
    <body> 
<form action="search_userinfo.php" method="get" class="form" >
<select name="keywords" id="keywords">
<option value="">选择</option>
<?php
          require 'conn.php';
          $sql= mysqli_query($conn,"select * from major");
          while($row = mysqli_fetch_array($sql))
            {
              echo "<option value='$row[major_name]'>$row[major_name]</option>";//循环，拼凑下拉框选项
            } 
          ?>
<option value="教师">教师</option>
<option value="审核员">审核员</option>
</select>
<input type="submit" name="submit" value="查询" />
    </form>
    <center>
    <form action="search_userinfo.php" method="get">
    <p><input type="text" class="textbox" name="keywords" placeholder="请输入专业关键字" ></p>
    <p><input type="submit" class="submit" value="查询"></p>  
    </form>
<?php
include_once("conn.php");  
require_once('include/page_one.class.php'); //分页类  
$showrow = 12; //一页显示的行数  
$curpage = empty($_GET['page']) ? 1 : $_GET['page']; //当前的页,还应该处理非数字的情况  
$url = "?page={page}"; //分页地址，如果有检索条件 ="?page={page}&q=".$_GET['q']  
$sql="select id, name,sex,username, major, phone,email,login_num,wtime,ip from student order by username asc ";
$total = mysqli_num_rows(mysqli_query($conn, $sql)); //记录总条数  
if (!empty($_GET['page']) && $total != 0 && $curpage > ceil($total / $showrow))  
$curpage = ceil($total_rows / $showrow); //当前页数大于最后页数，取最后一页  
//获取数据  
$sql .= " LIMIT " . ($curpage - 1) * $showrow . ",$showrow;";  
$result = mysqli_query($conn, $sql);
?>
<div class="container">
<!-- <h2 class="page-header" style="font-size:20px;">用户信息列表</h2> -->
<form action='action.php?action=delete_stu_all' method='post'>
 <table class="table table-hover table-bordered" style="width:1085px;position: relative;left: -59px;font-size: 10px; ">
 <input class="" type="submit" value="批量删除" id="del" onclick="return tishi()" style="margin-top:10px;/>
 
      <tr class="success mx-0">
       <td class=" text-center"><input type="checkbox" id="qx" onclick="xuanzhong()" />全选 </td>
           <th>序号</th>
           <th>姓 名</th>
           <th>性别</th>
           <th>学号</th>
           <th>专业</th>
           <th>电话</th>
           <th>邮箱</th>
           <th>登录次数</th>
          <th>最近登录时间</th>
           <th>ip</th> 
           <th>操作</th>
           </tr>
<?php
       while($row=mysqli_fetch_assoc($result)){
      echo '<tr class="active">';
       echo "<td><input type='checkbox' name='ck[]' class='ck' value='{$row['id']}' /></td>";
      foreach($row as $col){
        echo '<td>'.$col.'</td>';
      }
      echo "<td><a href='edit_info.php?id={$row['id']}'>编辑</a>
            <a href='action.php?action=delete_info&id={$row['id']}' onclick='return del()'>删除</a></td>";
      echo '</tr>';
    }
        echo '</table>';
        echo '</form>';
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