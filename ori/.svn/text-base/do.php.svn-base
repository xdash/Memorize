<?php

header("Content-type: text/html;charset=utf-8");

$TodayDate=date('Y-m-j');
echo $TodayDate;

$TomorrowDate=date('Y-m-j', strtotime('+5 days'));
echo date('Y-m-j', strtotime('+5 days'));



// 包含配置文件
require_once('config.php');

// 选择数据库
mysql_select_db(App_MysqlName); // 选择数据库

// 设置编码为UTF-8
mysql_query("set names utf8");	// 设置编码为UTF-8



$Action = $_POST['nAction']; // 获得操作名称


	// 添加新内容 
	if( $Action == "add" ) {


			if( $_POST['nItem1'] <> "" ) { // 添加Item 1/5
					$sql = "insert into items(item,description,user,stat,createdate,date1,date2,date3,date4,date5,date6,date7,date8) values('".$_POST['nItem1']."','".$_POST['nDescription1']."','demo','1',curdate(),'".date('Y-m-j', strtotime('+1 days'))."','".date('Y-m-j', strtotime('+2 days'))."','".date('Y-m-j', strtotime('+4 days'))."','".date('Y-m-j', strtotime('+7 days'))."','".date('Y-m-j', strtotime('+15 days'))."','".date('Y-m-j', strtotime('+30 days'))."','".date('Y-m-j', strtotime('+90 days'))."','".date('Y-m-j', strtotime('+180 days'))."' )";
					echo $sql;
					mysql_query($sql,$conn);
					}

			if( $_POST['nItem2'] <> "" ) { // 添加Item 2/5
					$sql = "insert into items(item,description,user,stat,createdate,date1,date2,date3,date4,date5,date6,date7,date8) values('".$_POST['nItem2']."','".$_POST['nDescription2']."','demo','1',curdate(),'".date('Y-m-j', strtotime('+1 days'))."','".date('Y-m-j', strtotime('+2 days'))."','".date('Y-m-j', strtotime('+4 days'))."','".date('Y-m-j', strtotime('+7 days'))."','".date('Y-m-j', strtotime('+15 days'))."','".date('Y-m-j', strtotime('+30 days'))."','".date('Y-m-j', strtotime('+90 days'))."','".date('Y-m-j', strtotime('+180 days'))."' )";
					echo $sql;
					mysql_query($sql,$conn);
					}

			if( $_POST['nItem3'] <> "" ) { // 添加Item 3/5
					$sql = "insert into items(item,description,user,stat,createdate,date1,date2,date3,date4,date5,date6,date7,date8) values('".$_POST['nItem3']."','".$_POST['nDescription3']."','demo','1',curdate(),'".date('Y-m-j', strtotime('+1 days'))."','".date('Y-m-j', strtotime('+2 days'))."','".date('Y-m-j', strtotime('+4 days'))."','".date('Y-m-j', strtotime('+7 days'))."','".date('Y-m-j', strtotime('+15 days'))."','".date('Y-m-j', strtotime('+30 days'))."','".date('Y-m-j', strtotime('+90 days'))."','".date('Y-m-j', strtotime('+180 days'))."' )";
					echo $sql;
					mysql_query($sql,$conn);
					}

			if( $_POST['nItem4'] <> "" ) { // 添加Item 4/5
					$sql = "insert into items(item,description,user,stat,createdate,date1,date2,date3,date4,date5,date6,date7,date8) values('".$_POST['nItem4']."','".$_POST['nDescription4']."','demo','1',curdate(),'".date('Y-m-j', strtotime('+1 days'))."','".date('Y-m-j', strtotime('+2 days'))."','".date('Y-m-j', strtotime('+4 days'))."','".date('Y-m-j', strtotime('+7 days'))."','".date('Y-m-j', strtotime('+15 days'))."','".date('Y-m-j', strtotime('+30 days'))."','".date('Y-m-j', strtotime('+90 days'))."','".date('Y-m-j', strtotime('+180 days'))."' )";
					echo $sql;
					mysql_query($sql,$conn);
					}

			if( $_POST['nItem5'] <> "" ) { // 添加Item 5/5
					$sql = "insert into items(item,description,user,stat,createdate,date1,date2,date3,date4,date5,date6,date7,date8) values('".$_POST['nItem5']."','".$_POST['nDescription5']."','demo','1',curdate(),'".date('Y-m-j', strtotime('+1 days'))."','".date('Y-m-j', strtotime('+2 days'))."','".date('Y-m-j', strtotime('+4 days'))."','".date('Y-m-j', strtotime('+7 days'))."','".date('Y-m-j', strtotime('+15 days'))."','".date('Y-m-j', strtotime('+30 days'))."','".date('Y-m-j', strtotime('+90 days'))."','".date('Y-m-j', strtotime('+180 days'))."' )";
					echo $sql;
					mysql_query($sql,$conn);
					}



	}


?>