<?php
session_start();


if( isset($_SESSION['last_key']) )

	$isLogin="1";

else

	header('Location: index.php');


include_once( 'config.php' );
include_once( 'includes/common.php' );
include_once( 'includes/weibooauth.php' );
include_once( 'recall.php' );


// account/verify_credentials
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

	$SendToWeibo = new SaeTClient( WB_AKEY , WB_SKEY , $_SESSION['last_key']['oauth_token'] , $_SESSION['last_key']['oauth_token_secret']  );

?>





<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns=" http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta name="viewport" content="width=device-width; initial-scale=1.5; maximum-scale=2.0; minimum-scale=1.0; user-scalable=false;"/>
	<link type="text/css" rel="stylesheet" href="/css/style.css" /> 
	<link rel="stylesheet" media="all and (orientation:landscape)" href="/css/landscape.css">

	<title>List - Memorize Index</title>
</head>
<body>

<!-- 有道词典划词翻译 -->
<div id="YOUDAO_SELECTOR_WRAPPER" style="display:none; margin:0; border:0; padding:0; width:320px; height:240px;"></div>
<script type="text/javascript" src="http://fanyi.youdao.com/fanyiapi.do?keyfrom=Memorize&key=572409860&type=selector&version=1.0&translate=on" charset="utf-8"></script>








<div id="container"> 


<?php include_once( 'header.php' );?>


	<div id="content">


			<?php

			mysql_select_db(App_MysqlName); // 选择数据库
			mysql_query("set names utf8");	// 设置编码为UTF-8


	//echo $msg['id'];



			if (isRandom() == 1){ //随机排序

				// 查询条件
				$sql = "SELECT * FROM items WHERE (user='".$msg['id']."') AND (date1='".date('Y-m-j')."' OR date2='".date('Y-m-j')."' OR date3='".date('Y-m-j')."' OR date4='".date('Y-m-j')."' OR date5='".date('Y-m-j')."' OR date6='".date('Y-m-j')."' OR date7='".date('Y-m-j')."' or createdate=curdate() ) order by RAND()";

				//echo $sql;

				$res = mysql_query($sql) or die(mysql_error());

						 
				// 循环读出数据内容

				echo "<ul id='list'>";

				while( $obj = mysql_fetch_object($res)){

						echo TxtToHtml("<li>
						<img class='prioryicon' src='/images/icon_item.png'/>
						<div class='word'><a target='_blank' title='创建日期：".$obj->createdate."' href='http://dict.baidu.com/s?wd=".$obj->item."'><strong>".$obj->item."</strong></a></div>");

						if (isRecall() <> 1) {//如果回忆模式（recall==1）不显示解释，否则显示
							echo TxtToHtml("<div class='description'> ".$obj->description."</div>");
							}

						echo "<a title='编辑' class='edit' href='edit.php?id=".$obj->id."'>Edit</a>
						<a title='删除' class='del' href='do.php?action=del&id=".$obj->id."'>Delete</a>
						</li>";

				}

				echo "</ul>";

				}

			else{

				// 查询条件
				$sql = "SELECT * FROM items WHERE (user='".$msg['id']."') AND (date1='".date('Y-m-j')."' OR date2='".date('Y-m-j')."' OR date3='".date('Y-m-j')."' OR date4='".date('Y-m-j')."' OR date5='".date('Y-m-j')."' OR date6='".date('Y-m-j')."' OR date7='".date('Y-m-j')."' or createdate=curdate() ) order by id desc";

				//echo $sql;

				$res = mysql_query($sql) or die(mysql_error());

						 
				// 循环读出数据内容

				echo "<ul id='list'>";

				while( $obj = mysql_fetch_object($res)){

						echo TxtToHtml("<li>
						<img class='prioryicon' src='/images/icon_item.png'/>
						<div class='word'><a target='_blank' title='创建日期：".$obj->createdate."' href='http://dict.baidu.com/s?wd=".$obj->item."'><strong>".$obj->item."</strong></a></div>");

						if (isRecall() <> 1) {//如果回忆模式（recall==1）不显示解释，否则显示
							echo TxtToHtml("<div class='description'> ".$obj->description."</div>");
							}

						echo "<a title='编辑' class='edit' href='edit.php?id=".$obj->id."'>Edit</a>
						<a title='删除' class='del' href='do.php?action=del&id=".$obj->id."'>Delete</a>
						</li>";

				}

				echo "</ul>";

				}





	
			?>




	</div>


<?php include_once( 'footer.php' );?>

</div>





</body>


</html>