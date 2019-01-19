<?php
header("Content-type:application/vnd.ms-excel");
header("Content-Disposition:filename=课题信息.xls");
   require 'conn.php';
    $sql = "select id,topic_id,topic_name,teacher_id,teacher_name,class,topic_type,total_stu,status from topics ";
    $query = mysqli_query($conn, $sql);
    echo '<table border="1" cellspacing="0">';
    echo '<tr>
     <th>序号</th>
     <th>课题编号</th>
     <th>课题名称</th>
     <th>教师编号</th>
     <th>教师姓名</th>
     <th>课题专业</th>
     <th>课题类型</th>
     <th>允许人数</th>
     <th>审核状态</th>
    </tr>';
while ($row=mysqli_fetch_assoc($query)) {
  echo '<tr>';
  foreach ($row as $col) {
    echo '<td>'.$col.'</td>';
  }
  echo '</tr>';
}
echo '</table>';
?>