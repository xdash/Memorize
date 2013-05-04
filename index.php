<?php

// 验证用户是否已经登录新浪OAuth认证
session_start();

//if( isset($_SESSION['last_key']) ) echo "OK" ;

if( isset($_SESSION['last_key']) )  header('Location: list.php');

include_once( 'config.php' );
include_once( 'includes/weibooauth.php' );



$o = new SaeTOAuth( WB_AKEY , WB_SKEY  );

$keys = $o->getRequestToken();
$aurl = $o->getAuthorizeURL( $keys['oauth_token'] ,false , 'http://' . $_SERVER['HTTP_APPNAME'] . '.sinaapp.com/callback.php');

$_SESSION['keys'] = $keys;


?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns=" http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta name="viewport" content="width=device-width; initial-scale=1.5; maximum-scale=2.0; minimum-scale=1.0; user-scalable=false;"/>
	<link type="text/css" rel="stylesheet" href="/css/style.css" /> 
	<title>Login - Memorize Index</title>
</head>
<body>

<div id="container"> 


<?php include_once( 'header.php' );?>


<div id="content">




<div align="center">

	您尚未登录，<img src="/images/icon_weibo.png" /> <a href="<?=$aurl?>">使用新浪微博账号登录</a>。<br/><br/>
	<a href="about.php">关于</a> | <a target="_blank" href="http://www.fanbing.net">作者主页</a>
	

</div>



</div>

</div>




<?php include_once( 'footer.php' );?>


</body>


</html>