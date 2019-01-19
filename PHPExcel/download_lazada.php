<?php
require('./include/common.inc.php');
require('phpexcel.php');
require('PHPExcel/Writer/Excel2007.php');

$username = isset($_SESSION['person'])?$_SESSION['person']:'';
$person = $db->getrs('select * from person where `username`="'.$username.'" ');
if(!$person){
    msg('','location="login.php"');
}

$ids=isset($_GET['ids'])?html($_GET['ids']):'';
$act=isset($_GET['act'])?html($_GET['act']):'';
$sq='';


if($act=='all'){
    $sq = '';
}else if($act=='some' && $ids!=''){
    $ids = substr($ids,0,-1);
    if($ids==''){
        msg('','location="mydata.php"');
        exit();
    }
    $sq = ' and b.pl_id in ('.$ids.') ';
}else{
    msg('','location="mydata.php"');
}

//表格数组
$sql = 'select a.id as data_id,c.lm,c.Brand_r,c.img_sl as f_img_sl,b.*,c.spu as f_spu,c.weight,c.kuanshi,c.id as f_id,c.title as f_title,c.lm from data a,pl_info b,pro_co c where  a.person_id='.$person['id'].' and pro_id=c.id and c.id=b.pl_id '.$sq.' order by c.id desc';
$data_pro=$db->getrss($sql);
// var_dump($data_pro);
// exit();
if(!$data_pro){
    msg('暂无商品数据！');
}

/*
    10001303戒指
    10001299项链
    10001798耳环
    10001337手链
    10001301手镯
    10001305脚链
*/

function getCategory($lm){
    $Category = '10001303';
    if($lm==64){
        $Category = '10001303';
    }else if($lm==65){
        $Category = '10001299';
    }else if($lm==66||$lm==71||$lm==72){
        $Category = '10001798';
    }else if($lm==67){
        $Category = '10001337';
    }else if($lm==68){
        $Category = '10001301';
    }else if($lm==69){
        $Category = '10001305';
    }else{
        $Category = '10001303';
    }
    return $Category;
}


$ar_lm = $db->getrss('select title_lm,id_lm from pro_lm where level_lm=2');
$arr_lm=array();
foreach ($ar_lm as $key => $value) {
    $arr_lm[$value['id_lm']]=$value['title_lm'];
}

//实例化表格
$objPHPExcel = new PHPExcel();
$objPHPExcel->getProperties()->setCreator("Maarten Balliauw")                                                       //创建人
                             ->setLastModifiedBy("Maarten Balliauw")                                                //最后修改人
                             ->setTitle("Office 2007 XLSX Test Document")                                           //标题
                             ->setSubject("Office 2007 XLSX Test Document")                                         //题目
                             ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")   //描述
                             ->setKeywords("office 2007 openxml php")                                               //关键字
                             ->setCategory("Test result file");                                                     //种类

            //设置表格每列样式和内容
            $objPHPExcel->createSheet();        
            $objPHPExcel->setActiveSheetIndex(0);                              //设置第一个表格为当前表格
            $objPHPExcel->getActiveSheet()->setTitle('Order detail');               //设置当前表格名称

            $letter = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','AA','AB','AC','AD','AE','AF','AG','AH','AI','AJ','AK','AL','AM','AN','AO','AP','AQ','AR','AS','AT','AU','AV','AW','AX','AY','AZ','BA','BB','BC','BD','BE','BF','BG','BH','BI','BJ','BK','BL','BM','BN','BO','BP','BQ','BR','BS','BT','BU','BV','BW','BX','BY','BZ','CA','CB','CC');

            //设置当前表格的A列的宽度
            $objPHPExcel->getActiveSheet()->getColumnDimension('A' )->setWidth(10);
            $objPHPExcel->getActiveSheet()->getColumnDimension('B' )->setWidth(10);
            $objPHPExcel->getActiveSheet()->getColumnDimension('C' )->setWidth(10);
            $objPHPExcel->getActiveSheet()->getColumnDimension('D' )->setWidth(10);
            $objPHPExcel->getActiveSheet()->getColumnDimension('E' )->setWidth(10);
            $objPHPExcel->getActiveSheet()->getColumnDimension('F' )->setWidth(10);
            $objPHPExcel->getActiveSheet()->getColumnDimension('G' )->setWidth(10);
            $objPHPExcel->getActiveSheet()->getColumnDimension('H' )->setWidth(10);
            $objPHPExcel->getActiveSheet()->getColumnDimension('I' )->setWidth(10); 
            $objPHPExcel->getActiveSheet()->getColumnDimension('J' )->setWidth(10); 
            $objPHPExcel->getActiveSheet()->getColumnDimension('K' )->setWidth(10); 
            $objPHPExcel->getActiveSheet()->getColumnDimension('L' )->setWidth(10); 
            $objPHPExcel->getActiveSheet()->getColumnDimension('M' )->setWidth(10); 
            $objPHPExcel->getActiveSheet()->getColumnDimension('N' )->setWidth(10); 
            $objPHPExcel->getActiveSheet()->getColumnDimension('O' )->setWidth(10); 
            $objPHPExcel->getActiveSheet()->getColumnDimension('P' )->setWidth(10); 
            $objPHPExcel->getActiveSheet()->getColumnDimension('Q' )->setWidth(10); 
            $objPHPExcel->getActiveSheet()->getColumnDimension('R' )->setWidth(10); 
            $objPHPExcel->getActiveSheet()->getColumnDimension('S' )->setWidth(10); 
            $objPHPExcel->getActiveSheet()->getColumnDimension('T' )->setWidth(10); 
            $objPHPExcel->getActiveSheet()->getColumnDimension('U' )->setWidth(10); 
            $objPHPExcel->getActiveSheet()->getColumnDimension('V' )->setWidth(10); 
            $objPHPExcel->getActiveSheet()->getColumnDimension('W' )->setWidth(10); 
            $objPHPExcel->getActiveSheet()->getColumnDimension('X' )->setWidth(10); 
            $objPHPExcel->getActiveSheet()->getColumnDimension('Y' )->setWidth(10); 
            $objPHPExcel->getActiveSheet()->getColumnDimension('Z' )->setWidth(10); 
            $objPHPExcel->getActiveSheet()->getColumnDimension('AA' )->setWidth(10);
            $objPHPExcel->getActiveSheet()->getColumnDimension('AB' )->setWidth(10);
            $objPHPExcel->getActiveSheet()->getColumnDimension('AC' )->setWidth(10);
            $objPHPExcel->getActiveSheet()->getColumnDimension('AD' )->setWidth(10);
            $objPHPExcel->getActiveSheet()->getColumnDimension('AE' )->setWidth(10);
            $objPHPExcel->getActiveSheet()->getColumnDimension('AF' )->setWidth(10);
            $objPHPExcel->getActiveSheet()->getColumnDimension('AG' )->setWidth(10);
            $objPHPExcel->getActiveSheet()->getColumnDimension('AH' )->setWidth(10);
            $objPHPExcel->getActiveSheet()->getColumnDimension('AI' )->setWidth(10); 
            $objPHPExcel->getActiveSheet()->getColumnDimension('AJ' )->setWidth(10); 
            $objPHPExcel->getActiveSheet()->getColumnDimension('AK' )->setWidth(10); 
            $objPHPExcel->getActiveSheet()->getColumnDimension('AL' )->setWidth(10); 
            $objPHPExcel->getActiveSheet()->getColumnDimension('AM' )->setWidth(10); 
            $objPHPExcel->getActiveSheet()->getColumnDimension('AN' )->setWidth(10); 
            $objPHPExcel->getActiveSheet()->getColumnDimension('AO' )->setWidth(10); 
            $objPHPExcel->getActiveSheet()->getColumnDimension('AP' )->setWidth(10); 
            $objPHPExcel->getActiveSheet()->getColumnDimension('AQ' )->setWidth(10); 
            $objPHPExcel->getActiveSheet()->getColumnDimension('AR' )->setWidth(10); 
            $objPHPExcel->getActiveSheet()->getColumnDimension('AS' )->setWidth(10); 
            $objPHPExcel->getActiveSheet()->getColumnDimension('AT' )->setWidth(10); 
            $objPHPExcel->getActiveSheet()->getColumnDimension('AU' )->setWidth(10); 
            $objPHPExcel->getActiveSheet()->getColumnDimension('AV' )->setWidth(10); 
            $objPHPExcel->getActiveSheet()->getColumnDimension('AW' )->setWidth(10); 
            $objPHPExcel->getActiveSheet()->getColumnDimension('AX' )->setWidth(10); 
            $objPHPExcel->getActiveSheet()->getColumnDimension('AY' )->setWidth(10); 
            $objPHPExcel->getActiveSheet()->getColumnDimension('AZ' )->setWidth(10); 
            $objPHPExcel->getActiveSheet()->getColumnDimension('BA' )->setWidth(10);
            $objPHPExcel->getActiveSheet()->getColumnDimension('BB' )->setWidth(10);
            $objPHPExcel->getActiveSheet()->getColumnDimension('BC' )->setWidth(10);
            $objPHPExcel->getActiveSheet()->getColumnDimension('BD' )->setWidth(10);
            $objPHPExcel->getActiveSheet()->getColumnDimension('BE' )->setWidth(10);
            $objPHPExcel->getActiveSheet()->getColumnDimension('BF' )->setWidth(10);
            $objPHPExcel->getActiveSheet()->getColumnDimension('BG' )->setWidth(10);
            $objPHPExcel->getActiveSheet()->getColumnDimension('BH' )->setWidth(10);
            $objPHPExcel->getActiveSheet()->getColumnDimension('BI' )->setWidth(10); 
            $objPHPExcel->getActiveSheet()->getColumnDimension('BJ' )->setWidth(10); 
            $objPHPExcel->getActiveSheet()->getColumnDimension('BK' )->setWidth(10); 
            $objPHPExcel->getActiveSheet()->getColumnDimension('BL' )->setWidth(10); 
            $objPHPExcel->getActiveSheet()->getColumnDimension('BM' )->setWidth(10); 
            $objPHPExcel->getActiveSheet()->getColumnDimension('BN' )->setWidth(10); 
            $objPHPExcel->getActiveSheet()->getColumnDimension('BO' )->setWidth(10); 
            $objPHPExcel->getActiveSheet()->getColumnDimension('BP' )->setWidth(10); 
            $objPHPExcel->getActiveSheet()->getColumnDimension('BQ' )->setWidth(10); 
            $objPHPExcel->getActiveSheet()->getColumnDimension('BR' )->setWidth(10); 
            $objPHPExcel->getActiveSheet()->getColumnDimension('BS' )->setWidth(10); 
            $objPHPExcel->getActiveSheet()->getColumnDimension('BT' )->setWidth(10); 
            $objPHPExcel->getActiveSheet()->getColumnDimension('BU' )->setWidth(10); 
            $objPHPExcel->getActiveSheet()->getColumnDimension('BV' )->setWidth(10); 
            $objPHPExcel->getActiveSheet()->getColumnDimension('BW' )->setWidth(10); 
            $objPHPExcel->getActiveSheet()->getColumnDimension('BX' )->setWidth(10); 
            $objPHPExcel->getActiveSheet()->getColumnDimension('BY' )->setWidth(10); 
            $objPHPExcel->getActiveSheet()->getColumnDimension('BZ' )->setWidth(10); 
            $objPHPExcel->getActiveSheet()->getColumnDimension('CA' )->setWidth(10);
            $objPHPExcel->getActiveSheet()->getColumnDimension('CB' )->setWidth(10);
            $objPHPExcel->getActiveSheet()->getColumnDimension('CC' )->setWidth(10);

            $styleArray1 = array(
              'font' => array(
                'bold' => true,
                'size'=>20,
                'color'=>array(
                  'argb' => 'ffffff',
                ),
              ),
              
            );
             $styleArray2 = array(
               'font' => array(
                 'bold' => true,
                 'size'=>13,
                 'color'=>array(
                   'argb' => '000000',
                )
               )
             );
            $styleArray3 = array(
               'font' => array(
                 'bold' => true,
                 'size'=>13,
                  'color'=>array(
                    'argb' => '000000',
                  ),
                ),
              );
                $styleArray4 = array(
                   'font' => array(
                        'bold' => true,
                        'size'=>13,
                        'color'=>array(
                            'argb' => '000000',
                        ),
                   ),
                );

                 $i=1;
                 //设置背景色
                 // $objPHPExcel->getActiveSheet()->getStyle('A'.$i.':DQ'.$i.'')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);  
                 // $objPHPExcel->getActiveSheet()->getStyle('A'.$i.':DQ'.$i.'')->getFill()->getStartColor()->setRGB('C0C0C0');  
                 // // 将A1单元格设置为加粗，居中
                 // $objPHPExcel->getActiveSheet()->getStyle('A'.$i.':DQ'.$i.'')->applyFromArray($styleArray4);
                 // $objPHPExcel->getActiveSheet()->getStyle('A'.$i.':DQ'.$i.'')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                 // $objPHPExcel->getActiveSheet()->getStyle('A'.$i.':DQ'.$i.'')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
                 
                 //表格
                 $styleThinBlackBorderOutline = array(
                        'borders' => array (
                              'outline' => array (
                                    'style' => PHPExcel_Style_Border::BORDER_THIN,   //设置border样式
                                    //'style' => PHPExcel_Style_Border::BORDER_THICK,  另一种样式
                                    'color' => array ('argb' => 'FF000000'),          //设置border颜色
                             ),
                       ),
                 );
                 
                 // $objPHPExcel->getActiveSheet()->getStyle('A9:R14')->applyFromArray($styleThinBlackBorderOutline);
                //表头数组/字段
                $tableheader = array('PrimaryCategory','brand','model','color_family','Hazmat','frame_color','frame_type','metal','shape','lens_quality','sunglasses_lens_type','material_type','main_stone','occasion','coloured_gems_type','diamond_clarity','diamond_colour','diamond_cut','diamond_carat_size','body_jewellery','jel_packaging_type','jel_tool_equipment','movement','glass','watch_case_size','feature','movement_country','water_resistant','case_shape','strap','watch_dial_size','name','name_ms','description','description_ms','short_description','external_url','video','warranty','product_warranty_en','product_warranty','warranty_type','price','special_price','special_from_date','special_to_date','SellerSku','AssociatedSku','quantity','package_content','package_length','package_width','package_height','package_weight','seller_promotion','MainImage','Image2','Image3','Image4','Image5','Image6','Image7','Image8','barcode_ean','tax_class','published_date','std_search_keywords','astigmatism_left','lens_power_left','astigmatism_right','lens_power_right','lens_color','eyewear_size','lens_classification','bracelet_size','earring_size','chain_size','ring_size','weight_of_metal','bangle_size','watch_strap_color');
                //填充表头信息
                for($i = 0;$i < count($tableheader);$i++) {
                    $objPHPExcel->getActiveSheet()->setCellValue("$letter[$i]1","$tableheader[$i]");
                }
                for($i = 0;$i < count($tableheader);$i++) {
                    $objPHPExcel->getActiveSheet()->setCellValue("$letter[$i]2","$tableheader[$i]");
                }
                for($i = 0;$i < count($tableheader);$i++) {
                    $objPHPExcel->getActiveSheet()->setCellValue("$letter[$i]3","$tableheader[$i]");
                }
                $i=4;
                

                foreach($data_pro as $key=>$value){
                    //select a.id as data_id,c.lm,c.Brand_r,c.img_sl as f_img_sl,b.*,c.spu as f_spu,c.weight,c.kuanshi,c.id as f_id,c.title as f_title,c.lm from data a,pl_info b,pro_co c where  a.person_id='.$person['id'].' and pro_id=c.id and c.id=b.pl_id '.$sq.' order by c.id desc
                    $objPHPExcel->getActiveSheet()->setCellValue("$letter[0]$i",getCategory($value['lm']));       
                    $objPHPExcel->getActiveSheet()->setCellValue("$letter[1]$i",$value['Brand_r']);
                    $objPHPExcel->getActiveSheet()->setCellValue("$letter[2]$i",$value['f_title']);       
                    $objPHPExcel->getActiveSheet()->setCellValue("$letter[3]$i",'Not Specified');       
                    $objPHPExcel->getActiveSheet()->setCellValue("$letter[4]$i",'None');       

                    $objPHPExcel->getActiveSheet()->setCellValue("$letter[31]$i",$value['f_title'].$value['title']);       
                    $objPHPExcel->getActiveSheet()->setCellValue("$letter[32]$i",$value['f_title'].$value['title']);       
                    $objPHPExcel->getActiveSheet()->setCellValue("$letter[33]$i",'description_img');       
                    $objPHPExcel->getActiveSheet()->setCellValue("$letter[34]$i",'description_img_ms');       
                    $objPHPExcel->getActiveSheet()->setCellValue("$letter[35]$i",'-');      

                    $objPHPExcel->getActiveSheet()->setCellValue("$letter[41]$i",'No Warranty');      
                    $objPHPExcel->getActiveSheet()->setCellValue("$letter[42]$i",$value['price']);      
                    $objPHPExcel->getActiveSheet()->setCellValue("$letter[46]$i",$value['spu']);     

                    $objPHPExcel->getActiveSheet()->setCellValue("$letter[48]$i",$value['stock']);      
                    $objPHPExcel->getActiveSheet()->setCellValue("$letter[49]$i",'');      
                    $objPHPExcel->getActiveSheet()->setCellValue("$letter[50]$i",'10');      
                    $objPHPExcel->getActiveSheet()->setCellValue("$letter[51]$i",'10');      
                    $objPHPExcel->getActiveSheet()->setCellValue("$letter[52]$i",'8');      
                    $objPHPExcel->getActiveSheet()->setCellValue("$letter[53]$i",'0.5');    



                    $objPHPExcel->getActiveSheet()->setCellValue("$letter[55]$i",'http://www.wonbuyer.com/'.getimgj($value['f_img_sl'],'d'));      
                    $pl_img=$db->getrss('select img_sl from pl_image where pl_id='.$value['f_id'].' limit 7 ');
                    $ii=56;
                    foreach ($pl_img as $key1 => $value1) {
                        $objPHPExcel->getActiveSheet()->setCellValue("$letter[$ii]$i",'http://www.wonbuyer.com/'.getimgj($value1['img_sl'],'d'));      
                        $ii++;
                    }

                    $objPHPExcel->getActiveSheet()->setCellValue("$letter[64]$i",'default');  

                    $objPHPExcel->getActiveSheet()->setCellValue("$letter[67]$i",'Not Specified');     
                    $objPHPExcel->getActiveSheet()->setCellValue("$letter[68]$i",'Not Specified');     
                    $objPHPExcel->getActiveSheet()->setCellValue("$letter[69]$i",'Not Specified');     
                    $objPHPExcel->getActiveSheet()->setCellValue("$letter[70]$i",'Not Specified');     
                    $objPHPExcel->getActiveSheet()->setCellValue("$letter[71]$i",'Not Specified');     
                    $objPHPExcel->getActiveSheet()->setCellValue("$letter[72]$i",'Not Size');     
                    $objPHPExcel->getActiveSheet()->setCellValue("$letter[73]$i",'Not Specified');     
                    $objPHPExcel->getActiveSheet()->setCellValue("$letter[74]$i",'Not Size');     
                    $objPHPExcel->getActiveSheet()->setCellValue("$letter[75]$i",'Not Size');     
                    $objPHPExcel->getActiveSheet()->setCellValue("$letter[76]$i",'Not Size');     
                    $objPHPExcel->getActiveSheet()->setCellValue("$letter[77]$i",'Not Specified');     
                    $objPHPExcel->getActiveSheet()->setCellValue("$letter[78]$i",'Not Specified');     
                    $objPHPExcel->getActiveSheet()->setCellValue("$letter[79]$i",'Not Size');     
                    $objPHPExcel->getActiveSheet()->setCellValue("$letter[80]$i",'Not Specified');     
                    
                    $i++;
                }

                $styleArray5 = array(
                  'font' => array(
                    'bold' => true,
                    'size'=>13,
                    'color'=>array(
                      'argb' => '000000',
                    ),
                  ),
                  
                );

//收货信息

//输出表格头部
ob_end_clean();//清除缓冲区,避免乱码
header('Content-Type: application/vnd.ms-excel;charset=UTF-8'); 
header('Content-Disposition:attachment;filename="'.'Lazada'.date('Ymd',time()).rand(10000,99999).'Jew'.'.xls"');
header('Cache-Control: max-age=0'); 


//设置打印页面
$objPHPExcel->getActiveSheet()->getPageSetup()->setPaperSize(\PHPExcel_Worksheet_PageSetup::PAPERSIZE_A4);
$objPHPExcel->setActiveSheetIndex(0);


$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');

    
?> 