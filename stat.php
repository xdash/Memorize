<?php
session_start();


if( isset($_SESSION['last_key']) )

	$isLogin="1";

else

	header('Location: index.php');


include_once( 'config.php' );
include_once( 'includes/common.php' );
include_once( 'includes/weibooauth.php' );



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
	<link type="text/css" rel="stylesheet" href="/css/style.css" /> 
	<title>Statistics - Memorize</title>
</head>
<body>

<div id="container"> 


<?php include_once( 'header.php' );?>


<div id="content">

<?php

			mysql_select_db(App_MysqlName); // 选择数据库
			mysql_query("set names utf8");	// 设置编码为UTF-8


			// 查询条件


			// 已添加单词量
			$sql = "SELECT COUNT(*) FROM items WHERE user='".$msg['id']."'";
			$NumAdded = mysql_fetch_row(mysql_query($sql)); 
			echo $NumAdded[0]; 


			// 已添加单词量
			$sql = "SELECT COUNT(*) FROM items WHERE id>0";
			$NumTotal = mysql_fetch_row(mysql_query($sql)); 
			echo $NumTotal[0]; 


			// 用户数量
			$sql = "SELECT user,count(*) FROM items GROUP BY user";
			$NumUser = mysql_num_rows($sql); 
			echo $NumUser; 




?>

	<ul id="list">

			
		<li><strong>我添加单词数：</strong> <?php echo $NumAdded[0]; ?> </li>

		<li><strong>系统单词总数：</strong> <?php echo $NumTotal[0]; ?> </li>

		<li><strong>系统用户总数：</strong> <?php echo $NumUser; ?> </li>

	</ul>


</div>

</div>



<?php include_once( 'footer.php' );?>

</body>


</html>