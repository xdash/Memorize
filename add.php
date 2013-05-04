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


?>





<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns=" http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta name="viewport" content="width=device-width; initial-scale=1.5; maximum-scale=2.0; minimum-scale=1.0; user-scalable=false;"/>
	<link type="text/css" rel="stylesheet" href="/css/style.css" /> 
	<title>Add - Memorize Index</title>
</head>
<body>

<div id="container"> 


<?php include_once( 'header.php' );?>


<div id="content">


		<form method="post" action="do.php"> 
		
			<div align="center">

				<input type="hidden"	name="nAction"		id="idAction"	value="add" />
				<input type="hidden"	name="nDateTime"	id="idDateTime"	value="<?php echo date('Y-m-d H:i:s');?>" />
				
				<br />

				<label for="nItem1">Item 1：</label>
				<input name="nItem1" id="idItem1" size="40" type="input"/><br /><br />
				  
				<label for="nDescription1"><small>Description：</small></label>
				<textarea name="nDescription1" id="idDescription1" rows="3" cols="40"/></textarea>

				<br /><br />

				<label for="nItem2">Item 2：</label>
				<input name="nItem2" id="idItem2" size="40" type="input"/><br /><br />
				  
				<label for="nDescription2"><small>Description：</small></label>
				<textarea name="nDescription2" id="idDescription2" rows="3" cols="40"/></textarea>

				<br /><br />

				<label for="nItem3">Item 3：</label>
				<input name="nItem3" id="idItem3" size="40" type="input"/><br /><br />
				  
				<label for="nDescription3"><small>Description：</small></label>
				<textarea name="nDescription3" id="idDescription3" rows="3" cols="40"/></textarea>

				<br /><br />

				<label for="nItem4">Item 4：</label>
				<input name="nItem4" id="idItem4" size="40" type="input"/><br /><br />
				  
				<label for="nDescription4"><small>Description：</small></label>
				<textarea name="nDescription4" id="idDescription4" rows="3" cols="40"/></textarea>

				<br /><br />

				<label for="nItem5">Item 5：</label>
				<input name="nItem5" id="idItem5" size="40" type="input"/><br /><br />
				  
				<label for="nDescription5">Description：</label>
				<textarea name="nDescription5" id="idDescription5" rows="3" cols="40"/></textarea><br /><br />


			</div>


		<div align="center">
			<input id="idSubmit" value="      SAVE      " type="submit" />
		</div>

	 </form> 



</div>

</div>




<?php include_once( 'footer.php' );?>


</body>


</html>