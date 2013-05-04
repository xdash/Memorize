<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns=" http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<link rel="stylesheet" href="style.css" type="text/css" media="screen" />
	<title>Unread List - Reado</title>
</head>
<body>

<div id="header">
</div>


<div id="wrapper" align="center">



		<?php

		// 包含配置文件
		require_once('config.php');

		mysql_select_db(App_MysqlName); // 选择数据库
		mysql_query("set names utf8");	// 设置编码为UTF-8


		// 查询条件
		$sql = "SELECT * FROM items WHERE date1='".date('Y-m-j')."' or date2='".date('Y-m-j')."' or date3='".date('Y-m-j')."' or date4='".date('Y-m-j')."' or date5='".date('Y-m-j')."' or date6='".date('Y-m-j')."' or date7='".date('Y-m-j')."' order by id desc";
		//echo $sql;

		$res = mysql_query($sql) or die(mysql_error());

		 
			// 循环读出数据内容
			while( $obj = mysql_fetch_object($res)){
				echo "<p><b>".$obj->item."</b><br/>".$obj->description."</p>";
			}

		?>


</div>



</body>
</head>