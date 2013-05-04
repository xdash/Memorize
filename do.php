<?php

session_start();

header("Content-type: text/html;charset=utf-8");

// 包含配置文件
include_once( 'config.php' );
include_once( 'includes/common.php' );
include_once( 'includes/weibooauth.php' );



// 获取新浪微博账号信息
	$c = new WeiboClient( WB_AKEY , 
						  WB_SKEY , 
						  $_SESSION['last_key']['oauth_token'] , 
						  $_SESSION['last_key']['oauth_token_secret']  );

	$msg = $c->verify_credentials();
	if ($msg === false || $msg === null){
		echo "Error occured";
		return false;
	}
	if (isset($msg['error_code']) && isset($msg['error'])){
		echo ('Error_code: '.$msg['error_code'].';  Error: '.$msg['error'] );
		return false;
	}

	//if (isset($msg['name'])){
	//	echo($msg['name']);
	//}
	//if (isset($msg['city'])){
	//	echo($msg['city']);
	//}
	//if (isset($msg['id'])){
	//	echo($msg['id']);
	//}




// 选择数据库
mysql_select_db(App_MysqlName); // 选择数据库

// 设置编码为UTF-8
mysql_query("set names utf8");	// 设置编码为UTF-8



$Action = $_POST['nAction']; // 获得操作名称


	// 添加新内容 
	if( $Action == "add" ) {


			if( $_POST['nItem1'] <> "" ) { // 添加Item 1/5
					$sql = "insert into items(item,description,user,stat,createdate,date1,date2,date3,date4,date5,date6,date7,date8) values('".HtmlToTxt($_POST['nItem1'])."','".HtmlToTxt($_POST['nDescription1'])."','".$msg['id']."','1',curdate(),'".date('Y-m-j', strtotime('+1 days'))."','".date('Y-m-j', strtotime('+2 days'))."','".date('Y-m-j', strtotime('+4 days'))."','".date('Y-m-j', strtotime('+7 days'))."','".date('Y-m-j', strtotime('+15 days'))."','".date('Y-m-j', strtotime('+30 days'))."','".date('Y-m-j', strtotime('+90 days'))."','".date('Y-m-j', strtotime('+180 days'))."' )";
					//echo $sql;
					mysql_query($sql,$conn);
					}

			if( $_POST['nItem2'] <> "" ) { // 添加Item 2/5
					$sql = "insert into items(item,description,user,stat,createdate,date1,date2,date3,date4,date5,date6,date7,date8) values('".HtmlToTxt($_POST['nItem2'])."','".HtmlToTxt($_POST['nDescription2'])."','".$msg['id']."','1',curdate(),'".date('Y-m-j', strtotime('+1 days'))."','".date('Y-m-j', strtotime('+2 days'))."','".date('Y-m-j', strtotime('+4 days'))."','".date('Y-m-j', strtotime('+7 days'))."','".date('Y-m-j', strtotime('+15 days'))."','".date('Y-m-j', strtotime('+30 days'))."','".date('Y-m-j', strtotime('+90 days'))."','".date('Y-m-j', strtotime('+180 days'))."' )";
					//echo $sql;
					mysql_query($sql,$conn);
					}

			if( $_POST['nItem3'] <> "" ) { // 添加Item 3/5
					$sql = "insert into items(item,description,user,stat,createdate,date1,date2,date3,date4,date5,date6,date7,date8) values('".HtmlToTxt($_POST['nItem3'])."','".HtmlToTxt($_POST['nDescription3'])."','".$msg['id']."','1',curdate(),'".date('Y-m-j', strtotime('+1 days'))."','".date('Y-m-j', strtotime('+2 days'))."','".date('Y-m-j', strtotime('+4 days'))."','".date('Y-m-j', strtotime('+7 days'))."','".date('Y-m-j', strtotime('+15 days'))."','".date('Y-m-j', strtotime('+30 days'))."','".date('Y-m-j', strtotime('+90 days'))."','".date('Y-m-j', strtotime('+180 days'))."' )";
					//echo $sql;
					mysql_query($sql,$conn);
					}

			if( $_POST['nItem4'] <> "" ) { // 添加Item 4/5
					$sql = "insert into items(item,description,user,stat,createdate,date1,date2,date3,date4,date5,date6,date7,date8) values('".HtmlToTxt($_POST['nItem4'])."','".HtmlToTxt($_POST['nDescription4'])."','".$msg['id']."','1',curdate(),'".date('Y-m-j', strtotime('+1 days'))."','".date('Y-m-j', strtotime('+2 days'))."','".date('Y-m-j', strtotime('+4 days'))."','".date('Y-m-j', strtotime('+7 days'))."','".date('Y-m-j', strtotime('+15 days'))."','".date('Y-m-j', strtotime('+30 days'))."','".date('Y-m-j', strtotime('+90 days'))."','".date('Y-m-j', strtotime('+180 days'))."' )";
					//echo $sql;
					mysql_query($sql,$conn);
					}

			if( $_POST['nItem5'] <> "" ) { // 添加Item 5/5
					$sql = "insert into items(item,description,user,stat,createdate,date1,date2,date3,date4,date5,date6,date7,date8) values('".HtmlToTxt($_POST['nItem5'])."','".HtmlToTxt($_POST['nDescription5'])."','".$msg['id']."','1',curdate(),'".date('Y-m-j', strtotime('+1 days'))."','".date('Y-m-j', strtotime('+2 days'))."','".date('Y-m-j', strtotime('+4 days'))."','".date('Y-m-j', strtotime('+7 days'))."','".date('Y-m-j', strtotime('+15 days'))."','".date('Y-m-j', strtotime('+30 days'))."','".date('Y-m-j', strtotime('+90 days'))."','".date('Y-m-j', strtotime('+180 days'))."' )";
					//echo $sql;
					mysql_query($sql,$conn);
					}


			
			//echo "添加成功，正在返回...";

			echo "<script language='javascript'>"; 
			echo " location='list.php';"; 
			echo "</script>";



	}



	// 编辑项目
	if( $Action == "edit" ) {


			$ItemID = $_POST['nId'];

			$sql = "UPDATE items SET item='".HtmlToTxt($_POST['nItem'])."' where id='".$ItemID."'" ;
			mysql_query($sql,$conn);
			$sql = "UPDATE items SET description='".HtmlToTxt($_POST['nDescription'])."' where id='".$ItemID."'" ;
			mysql_query($sql,$conn);


			
			//echo "编辑成功，正在返回...";

			echo "<script language='javascript'>"; 
			echo " location='list.php';"; 
			echo "</script>";

	}



	// 发送微博
	if( $Action == "weibo" ) {


				//Statuses/update
				$WeiboContent = new SaeTClient( WB_AKEY , 
									  WB_SKEY , 
									  $_SESSION['last_key']['oauth_token'] , 
									  $_SESSION['last_key']['oauth_token_secret']  );

				//echo $_POST['nWeibo'];

				//$msg = $WeiboContent->update($_POST['nWeibo']);
				$msg = $WeiboContent->update("测试一下");

				if ($msg === false || $msg === null){
					echo "Error occured";
					return false;
				}
				if (isset($msg['error_code']) && isset($msg['error'])){
					echo ('Error_code: '.$msg['error_code'].';  Error: '.$msg['error'] );
					return false;
				} 
				//echo($msg['id']." : ".$msg['text']." ".$msg["created_at"]);
			
			//echo "发送成功，正在返回...";

			echo "<script language='javascript'>"; 
			echo " location='list.php';"; 
			echo "</script>";



	}







// 删除内容

$Action = $_GET['action']; // 获得操作名称

if( $Action == "del"){

			//echo "开始删除";

			$sql = "DELETE FROM items WHERE id='".$_GET['id']."'";
			mysql_query($sql,$conn)
			or die("删除失败。".mysql_error() );

			// 返回列表页面
			

			//echo "删除成功，正在返回...";

			echo "<script language='javascript'>"; 
			echo " location='list.php';"; 
			echo "</script>";

}



?>