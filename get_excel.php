<?php
   require 'conn.php';  
   session_start();
   include 'PHPExcel/PHPExcel.php';  //引入核心库文件 
   include 'PHPExcel/PHPExcel/Writer/Excel2007.php'; //引入excel2007操作类  
   include 'PHPExcel/PHPExcel/IOFactory.php'; 
   
   $objPHPExcel = new PHPExcel(); //实例化phpexcel对象
   //创建人
   $objPHPExcel->getProperties()->setCreator("{$_SESSION['name']}");
   //最后修改人
   $objPHPExcel->getProperties()->setLastModifiedBy("{$_SESSION['name']}");
   //标题
   $objPHPExcel->getProperties()->setTitle("Office 2007 XLSX all user list Document");
   //题目
   $objPHPExcel->getProperties()->setSubject("Office 2007 XLSX all user list Document");
   //描述
   $objPHPExcel->getProperties()->setDescription("all user list");
   //关键字
   $objPHPExcel->getProperties()->setKeywords("all user list");
   //种类
   $objPHPExcel->getProperties()->setCategory("office document");    

   
   //设置当前的sheet
   $objPHPExcel->setActiveSheetIndex(0);
   
   //设置表头
   
   $objPHPExcel->getActiveSheet()->setCellValue('A1', "学号");  
   $objPHPExcel->getActiveSheet()->setCellValue('B1', "姓名");
   $objPHPExcel->getActiveSheet()->setCellValue('C1', "课题编号");
   $objPHPExcel->getActiveSheet()->setCellValue('D1', "课题名称");
   $objPHPExcel->getActiveSheet()->setCellValue('E1', "专业");
   $objPHPExcel->getActiveSheet()->setCellValue('F1', "课题类型");
   $objPHPExcel->getActiveSheet()->setCellValue('G1', "所选志愿");
   $objPHPExcel->getActiveSheet()->setCellValue('H1', "审核状态");

   
   $sql= "SELECT id,topic_id,topic_name,username,name,class,topic_type,will,status FROM topics_stu WHERE class='$_SESSION[keywords]' order by id desc";
   var_dump($sql);
   $res =mysqli_query($conn,$sql);
   $rowCount=2;
   while($row=mysqli_fetch_array($res)){ //把结果集进行遍历一行一行写入excel 
       $objPHPExcel->getActiveSheet()->setCellValue('A'.$rowCount, $row['username']);  
          $objPHPExcel->getActiveSheet()->setCellValue('B'.$rowCount ,$row['name']);  
          $objPHPExcel->getActiveSheet()->setCellValue('C'.$rowCount, $row['topic_id']);  
          $objPHPExcel->getActiveSheet()->setCellValue('D'.$rowCount, $row['topic_name']);  
          $objPHPExcel->getActiveSheet()->setCellValue('E'.$rowCount, $row['class']);
       $objPHPExcel->getActiveSheet()->setCellValue('F'.$rowCount, $row['topic_type']);
       $objPHPExcel->getActiveSheet()->setCellValue('G'.$rowCount, $row['will']);
        $objPHPExcel->getActiveSheet()->setCellValue('H'.$rowCount, $row['status']);
         $rowCount++;
   }
   // 高置列的宽度 
    $objPHPExcel->createSheet();        
    $objPHPExcel->setActiveSheetIndex(0);                              //设置第一个表格为当前表格
    $objPHPExcel->getActiveSheet()->setTitle('论文选题');     //设置当前表格名称

   $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(30);  
   $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(30);  
   $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(30);  
   $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(30);
   $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(30); 
   $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(30); 
   $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(30); 
   $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(30);  
    //设置单元格边框

    ob_end_clean(); //清除缓存防止乱码
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
     header('Content-Disposition: attachment;filename="'.$_SESSION['keywords'].'毕业论文选题.xlsx"'); //设置excel 文件名 
     header('Cache-Control: max-age=0');  
     $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');  
     $objWriter->save('php://output'); //保存 
    exit;
?>