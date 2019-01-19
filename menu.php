<?php 
switch ($_SESSION['role_id']) {
  case '1':
?>
<div class="layui-side layui-bg-black">
    <div class="layui-side-scroll">
      <!-- 左侧导航区域（可配合layui已有的垂直导航） -->
      <ul class="layui-nav layui-nav-tree"  lay-filter="test">
        <li class="layui-nav-item layui-nav-itemed">
          <a class="" href="javascript:;">个人管理中心</a>
          <dl class="layui-nav-child">
            <dd><a href="show_selfinfo.php" target="mainFrame">查看信息</a></dd>
            <dd><a href="changepwd.php" target="mainFrame">修改密码</a></dd>
          </dl>
        </li>
        <li class="layui-nav-item">
          <a href="javascript:;">课题管理中心</a>
          <dl class="layui-nav-child">
            <dd><a href="show_topic.php" target="mainFrame" onFocus="">查看课题信息</a></dd>
            <dd><a href="studentTopic_status.php" target="mainFrame">我的选题情况</a></dd>
            <dd><a href="stuPass_yes.php" target="mainFrame">查看通过课题</a></dd>
          </dl>
        </li>
         <li class="layui-nav-item">
          <a href="javascript:;">其他管理</a>
          <dl class="layui-nav-child">
            <dd> <a href="messages.php" target="mainFrame" onFocus="">留言板</a></dd>
           <!--  <dd><a href="uploadfile.php" target="mainFrame">文件上传与下载</a></dd> -->
            <dd><a href="logout.php" target="_top">注销</a></dd>
          </dl>
        </li>
        <div class="nameId" style="position:fixed;bottom:0px;left:15px;line-height:30px;">
        <li >学生：<?php echo $_SESSION['name']?></li>
        <li >学号：<?php echo $_SESSION['username']?></li>
        </div>
      </ul>
    </div>
  </div>
<?php
    break;
    ?>
<?php
  case '2':
  ?>
  <div class="layui-side layui-bg-black">
    <div class="layui-side-scroll">
      <!-- 左侧导航区域（可配合layui已有的垂直导航） -->
      <ul class="layui-nav layui-nav-tree"  lay-filter="test">
        <li class="layui-nav-item layui-nav-itemed">
          <a class="" href="javascript:;">个人管理中心</a>
          <dl class="layui-nav-child">
            <dd><a href="show_selfinfo.php" target="mainFrame">查看信息</a></dd>
            <dd><a href="changepwd.php" target="mainFrame">修改密码</a></dd>
          </dl>
        </li>
        <li class="layui-nav-item">
          <a href="javascript:;">课题管理中心</a>
          <dl class="layui-nav-child">
            <dd><a href="add_topic.php" target="mainFrame" onFocus="">申请课题</a></dd>
            <dd><a href="topics_status.php" target="mainFrame">课题审核情况</a></dd>
            <dd><a href="teaPass_no.php" target="mainFrame">未通过课题</a></dd>
             <dd><a href="teacherTopic_status.php" target="mainFrame">查看课题被选情况</a></dd>
              <dd><a href="endTopic_teacher.php" target="mainFrame">已/待匹配	课题</a></dd>
          </dl>
        </li>
         <li class="layui-nav-item">
          <a href="javascript:;">其他管理</a>
          <dl class="layui-nav-child">
            <dd> <a href="messages.php" target="mainFrame" onFocus="">留言板</a></dd>
            <!-- <dd><a href="uploadfile.php" target="mainFrame">文件上传与下载</a></dd> -->
            <dd><a href="logout.php" target="_top">注销</a></dd>
          </dl>
        </li>
        <div class="nameId" style="position:fixed;bottom:0px;left:15px;line-height:30px;">
        <li >教师：<?php echo $_SESSION['name']?></li>
        <li >工号：<?php echo $_SESSION['username']?></li>
        </div>
      </ul>
    </div>
  </div>
<?php
    break;
    ?>
<?php
  case '3':
  ?>
  <div class="layui-side layui-bg-black">
    <div class="layui-side-scroll">
      <!-- 左侧导航区域（可配合layui已有的垂直导航） -->
      <ul class="layui-nav layui-nav-tree"  lay-filter="test">
        <li class="layui-nav-item layui-nav-itemed">
          <a class="" href="javascript:;">个人管理中心</a>
          <dl class="layui-nav-child">
            <dd><a href="show_selfinfo.php" target="mainFrame">查看信息</a></dd>
            <dd><a href="changepwd.php" target="mainFrame">修改密码</a></dd>
          </dl>
        </li>
        <li class="layui-nav-item">
          <a href="javascript:;">课题审核中心</a>
          <dl class="layui-nav-child">
             <dd>  <a href="beginTopic_auditor.php" target="mainFrame" onFocus="">未审核课题信息</a></dd>
              <dd><a href="endTopic_auditor.php" target="mainFrame" onFocus="">已审核课题信息</a></dd>
          </dl>
        </li>
         <li class="layui-nav-item">
          <a href="javascript:;">其他管理</a>
          <dl class="layui-nav-child">
            <dd> <a href="messages.php" target="mainFrame" onFocus="">留言板</a></dd>
           <!--  <dd><a href="uploadfile.php" target="mainFrame">文件上传与下载</a></dd> -->
            <dd><a href="logout.php" target="_top">注销</a></dd>
          </dl>
        </li>
        <div class="nameId" style="position:fixed;bottom:0px;left:15px;line-height:30px;">
        <li >审核员：<?php echo $_SESSION['name']?></li>
        <li >&nbsp工&nbsp号&nbsp：<?php echo $_SESSION['username']?></li>
        </div>
      </ul>
    </div>
  </div>
<?php
    break;
    ?>
<?php
  default:
 ?>
 <div class="layui-side layui-bg-black">
    <div class="layui-side-scroll">
      <!-- 左侧导航区域（可配合layui已有的垂直导航） -->
      <ul class="layui-nav layui-nav-tree"  lay-filter="test">
        <li class="layui-nav-item layui-nav-itemed">
          <a class="" href="javascript:;">个人管理中心</a>
          <dl class="layui-nav-child">
            <dd><a href="show_selfinfo.php" target="mainFrame">查看信息</a></dd>
            <dd><a href="changepwd.php" target="mainFrame">修改密码</a></dd>
          </dl>
        </li>
        <li class="layui-nav-item">
          <a href="javascript:;">用户信息录入中心</a>
          <dl class="layui-nav-child">
             <dd>   <a href="show_info.php" target="mainFrame" onFocus="">查看信息</a></dd>
              <dd> <a href="add_info.php" target="mainFrame" onFocus="">用户信息录入</a></dd>
          </dl>
        </li>
         <li class="layui-nav-item">
          <a href="javascript:;">课题管理中心</a>
          <dl class="layui-nav-child">
             <dd>  <a href="student_topic.php" target="mainFrame" onFocus="">查看班级选题情况</a></dd>
              <dd> <a href="topics_no.php" target="mainFrame" onFocus="">待匹配学生</a><dd>
              <dd> <a href="noChoose.php" target="mainFrame" onFocus="">待匹配课题</a><dd>
               <dd> <a href="rand_topics.php" target="mainFrame" onFocus="">课题随机分配</a><dd>
          </dl>
        </li>
         <li class="layui-nav-item">
          <a href="javascript:;">公告管理中心</a>
          <dl class="layui-nav-child">
                <dd> <a href="news.php" target="mainFrame" onFocus="">添加公告信息</a><dd>
             <dd>  <a href="show_news.php" target="mainFrame" onFocus="">查看公告信息</a></dd>
          </dl>
        </li>
        <li class="layui-nav-item">
          <a href="javascript:;">专业管理中心</a>
          <dl class="layui-nav-child">
                <dd> <a href="add_major.php" target="mainFrame" onFocus="">添加专业/班别</a><dd>
             <dd>  <a href="show_major.php" target="mainFrame" onFocus="">查看专业/班别</a></dd>
          </dl>
        </li>
         <li class="layui-nav-item">
          <a href="javascript:;">其他管理</a>
          <dl class="layui-nav-child">
            <dd> <a href="adminMessages.php" target="mainFrame" onFocus="">留言管理</a></dd>
            <dd><a href="uploadfile.php" target="mainFrame">文件上传</a></dd>
            <dd><a href="logout.php" target="_top">注销</a></dd>
          </dl>
        </li>
      </ul>
    </div>
  </div>
 <?php
    break;
}

?>
