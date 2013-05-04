<?php 

session_start();


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


?>





<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns=" http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta name="viewport" content="width=device-width; initial-scale=1.5; maximum-scale=2.0; minimum-scale=1.0; user-scalable=false;"/>
	<link type="text/css" rel="stylesheet" href="/css/style.css" /> 
	<title>Edit - Memorize</title>
</head>
<body>

<div id="container"> 


<?php include_once( 'header.php' );?>


<div id="content">



<?php

		mysql_select_db(App_MysqlName); // 选择数据库
		mysql_query("set names utf8");	// 设置编码为UTF-8



		// 查询待编辑的Item

		$ItemID=$_GET['id'];

		$sql = "SELECT * FROM items WHERE id='".$ItemID."'";
		$res = mysql_query($sql) or die(mysql_error());
		while( $obj = mysql_fetch_object($res)){
			$EditItem = $obj->item;
			$EditDescription = $obj->description;
		}
		?>



		<form method="post" action="do.php"> 
		
			<div align="center">

				<input type="hidden"	name="nAction"		id="idAction"	value="edit" />
				<input type="hidden"	name="nId"			id="idId"		value="<?php echo $ItemID ?>" />

				<br />

				<label for="nItem">Item:</label>
				<input name="nItem" id="idItem" size="37" type="input" value="<?php echo TxtToHtml($EditItem)  ?>"/><br /><br />
				  
				<label for="nDescription"><small>Description:</small></label>
				<textarea name="nDescription" id="idDescription" rows="8" cols="40"   /><?php echo TxtToHtml($EditDescription)  ?></textarea>

			</div>

				<br/>

		<div align="center">
			<input id="idSubmit" value="      Save Changes      " type="submit" />
		</div>

	 </form> 



</div>

</div>




<?php include_once( 'footer.php' );?>


</body>


</html>