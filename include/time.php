	<!-- 管理时间日期脚本 -->
	<style>	
	#time{
		font-size: 15px;
		color: rgba(255,255,255,.7);
		padding-left: 20px;
	}

	</style>
	<div id="time">
	<?php
	 date_default_timezone_set('PRC');//设置为中华人民共和国
	echo "今日：" . date("Y-m-d H:i:s");
	$weekarray=array("日","一","二","三","四","五","六"); //先定义一个数组
	echo "&nbsp&nbsp星期".$weekarray[date("w")];
	?>
	</div>