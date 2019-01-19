<!-- 关键字搜索课题信息 -->
   <link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.min.css">
     <link href="css/page.css" type="text/css" rel="stylesheet" />
        <style type="text/css">   
            .demo{
                float: left;
                position: relative;
            }
 
            .textbox{
            float: left;
            margin-top: 2px;
            margin-left: 350px;
            width: 355px;
            height: 40px;
            border-radius: 3px;
            border:1px solid #e2b709;
            padding-left: 10px;
        }
        .submit{
            float: left;
             width: 50px;
             height: 30px;
             margin:8px; 
             color: white;
             background-color: #7fbdf0;
             border:1px solid #dedede;
             cursor:pointer;
        }
        .none{
          float: left;
          margin-left:450px; 
          margin-top: 20px;

        }
        </style>  
 <form action="search_topic.php" method="get">
    <p><input type="text" class="textbox" name="keywords" placeholder="请输入关键字" ></p>
    <p><input type="submit" class="submit" value="查询"></p>
    </form>
<?php  
require 'conn.php';
require_once('include/page_one.class.php'); //分页类 
$keywords=isset($_GET['keywords'])?trim($_GET['keywords']):''; 
$showrow = 8; //一页显示的行数  
$curpage = empty($_GET['page']) ? 1 : $_GET['page']; //当前的页,还应该处理非数字的情况  
$keywords=$_GET['keywords'];
$url ="?page={page}&keywords=".$_GET['keywords']; 
//分页地址，如果有检索条件 ="?page={page}&q=".$_GET['q']  
//省略了链接mysql的代码，测试时自行添加  
$sql= "SELECT id,topic_id,topic_name,teacher_id,teacher_name,class,topic_type,total_stu FROM topics WHERE class LIKE '%{$keywords}%' and status='通过' order by topic_id asc";
$total = mysqli_num_rows(mysqli_query($conn, $sql)); //记录总条数  
if (!empty($_GET['page']) && $total != 0 && $curpage > ceil($total / $showrow))  
    $curpage = ceil($total_rows / $showrow); //当前页数大于最后页数，取最后一页  
//获取数据  
$sql .= " LIMIT " . ($curpage - 1) * $showrow . ",$showrow;";  
$query= mysqli_query($conn, $sql);
 $user=array();
  if (!empty($keywords)) {
    while ($row=mysqli_fetch_assoc($query)) {
         $row['class']=str_replace($keywords, $keywords, $row['class']);
        // $row['class']=str_replace($keywords, '<font color="red">'.$keywords.'</font>', $row['class']);
        // str_replace(find,replace,string,count) find  必需。规定要查找的值。
        //replace   必需。规定替换 find 中的值的值。
        // string   必需。规定被搜索的字符串。
        // count    可选。对替换数进行计数的变量。
        $user[]=$row;
    }

if ($keywords) {
    echo '<h3 >查询关键字为：<font color="red">'.$keywords.'</font></h3>';
}

if ($user) {
  ?>
<table class="table table-hover table-bordered" style="text-align:center">
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
    foreach ($user as $key => $value) {
      ?>
      <tr class="active">
      <td><?php  echo $value['id']?></td>
      <td><?php  echo $value['topic_id']?></td>
      <td><?php  echo $value['topic_name']?></td>
      <td><?php  echo $value['teacher_id']?></td>
      <td><?php  echo $value['teacher_name']?></td>
      <td><?php  echo $value['class']?></td>
      <td><?php  echo $value['topic_type']?></td>
      <td ><?php  echo $value['total_stu']?></td>
        <form action='action_topic.php?action=choose_topic&id=<?php echo $value['id'] ?>' method='post'>
           <td><select name="will">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            </select></td>
          <td><a href='topic_show.php?id=<?php echo $row['id'] ?>'>详情</a></td>
           <td><input type="submit" /></td>
            </form> 
       <?php 
    }
        ?>


       </table>
<?php        
}else{
    echo '<font class="none" color="red">没有查询到相关的课题信息</font>';
}
 echo '<div id="showpage">';
  if ($total > $showrow) {//总记录数大于每页显示数，显示分页  
                $page = new page($total, $showrow, $curpage, $url, 2);  
             echo $page->myde_write();  
    } 
    echo '</div>';
}
?>  
