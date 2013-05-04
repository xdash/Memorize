<?php

/**
 * : fanbingx@gmail.com
 * : 2011-02-21 
 */ 


/*程序名称*/
define('App_Name','Memorize');
/*作者*/
define('App_Author','XDash');
/*版本*/
define('App_Version','0.01');
/*主页*/
define('App_Homepage','http://www.fanbing.net');
/*Email*/
define('App_Email','fanbingx@gmail.com');


// 数据库主机
$db_port=$_SERVER['HTTP_MYSQLPORT'];
define('App_MysqlHost',"m$db_port.mysql.sae.sina.com.cn:".$db_port);
// 数据库名称
define('App_MysqlName','app_'.$_SERVER['HTTP_APPNAME']);
// 数据库用户名
define('App_MysqlUser','kxj4y3k3nx');
// SAE数据库密码
define('App_MysqlPw','4x12x2h44jh04zyk5zkjw3i1jj3mi4lmkh41i3zi');


// 新浪微博开放平台密码
define( "WB_AKEY" , '1391812660' );
define( "WB_SKEY" , '27082878b942be2503c7a2edb84cc4a6' );





// 通用数据库查询条件
	$conn = mysql_connect(App_MysqlHost,App_MysqlUser,App_MysqlPw) 
	or die('Connect Fail');
	//echo 'Connect Success';




$db_port=$_SERVER['HTTP_MYSQLPORT'];//主库的host

$DbHost	=	"m$db_port.mysql.sae.sina.com.cn:".$db_port;
$DbPw	=	SAE_SECRETKEY;
$DbUser	=	SAE_ACCESSKEY;
$DbPrefix   = 'memo_';//表前缀







?>