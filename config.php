<?php

/**
 * : fanbingx@gmail.com
 * : 2011-02-21 
 */ 


/*��������*/
define('App_Name','Memorize');
/*����*/
define('App_Author','XDash');
/*�汾*/
define('App_Version','0.01');
/*��ҳ*/
define('App_Homepage','http://www.fanbing.net');
/*Email*/
define('App_Email','fanbingx@gmail.com');


// ���ݿ�����
$db_port=$_SERVER['HTTP_MYSQLPORT'];
define('App_MysqlHost',"m$db_port.mysql.sae.sina.com.cn:".$db_port);
// ���ݿ�����
define('App_MysqlName','app_'.$_SERVER['HTTP_APPNAME']);
// ���ݿ��û���
define('App_MysqlUser','kxj4y3k3nx');
// SAE���ݿ�����
define('App_MysqlPw','4x12x2h44jh04zyk5zkjw3i1jj3mi4lmkh41i3zi');


// ����΢������ƽ̨����
define( "WB_AKEY" , '1391812660' );
define( "WB_SKEY" , '27082878b942be2503c7a2edb84cc4a6' );





// ͨ�����ݿ��ѯ����
	$conn = mysql_connect(App_MysqlHost,App_MysqlUser,App_MysqlPw) 
	or die('Connect Fail');
	//echo 'Connect Success';




$db_port=$_SERVER['HTTP_MYSQLPORT'];//�����host

$DbHost	=	"m$db_port.mysql.sae.sina.com.cn:".$db_port;
$DbPw	=	SAE_SECRETKEY;
$DbUser	=	SAE_ACCESSKEY;
$DbPrefix   = 'memo_';//��ǰ׺







?>