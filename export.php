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
// ��ȡ����΢���˺���Ϣ

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


?>





<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns=" http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta name="viewport" content="width=device-width; initial-scale=1.5; maximum-scale=2.0; minimum-scale=1.0; user-scalable=false;"/>
	<link type="text/css" rel="stylesheet" href="/css/style.css" /> 
	<title>Export - Memorize</title>
</head>
<body>

<!-- �е��ʵ仮�ʷ��� -->
<div id="YOUDAO_SELECTOR_WRAPPER" style="display:none; margin:0; border:0; padding:0; width:320px; height:240px;"></div>
<script type="text/javascript" src="http://fanyi.youdao.com/fanyiapi.do?keyfrom=Memorize&key=572409860&type=selector&version=1.0&translate=on" charset="utf-8"></script>

<div id="container"> 


<?php include_once( 'header.php' );?>


<div id="content">


		<?php

		mysql_select_db(App_MysqlName); // ѡ�����ݿ�
		mysql_query("set names utf8");	// ���ñ���ΪUTF-8


//echo $msg['id'];


		// ��ѯ����
		$sql = "SELECT * FROM items WHERE user='".$msg['id']."' ORDER BY id DESC";

//echo $sql;

		$res = mysql_query($sql) or die(mysql_error());

		 
			// ѭ��������������

			echo "<div align='center'><label for='nExportText'><small>Exported Items as Pure Text:</small></label><br/><br/>
				<textarea name='nExportText' id='idExportText' rows='30' cols='55'/>";

			while( $obj = mysql_fetch_object($res)){
				echo TxtToHtml($obj->item)."\n\n"
					.TxtToHtml($obj->description)."\n\n";
				}
			echo "</textarea></div>";
		?>


</div>

</div>



<?php include_once( 'footer.php' );?>

</body>


</html>