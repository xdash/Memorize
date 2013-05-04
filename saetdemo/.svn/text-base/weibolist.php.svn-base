<?php

session_start();

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns=" http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<link rel="stylesheet" href="style.css" type="text/css" media="screen" />
	<title>test</title>
</head>

<body>




<?php

include_once( 'config.php' );
include_once( 'weibooauth.php' );





//account/verify_credentials
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
if (isset($msg['name'])){
	echo($msg['name']);
}

if (isset($msg['city'])){
	echo($msg['city']);
}

if (isset($msg['id'])){
	echo($msg['id']);
}

if (isset($msg['description'])){
	echo($msg['description']);
}





$c = new SaeTClient( WB_AKEY , WB_SKEY , $_SESSION['last_key']['oauth_token'] , $_SESSION['last_key']['oauth_token_secret']  );
$ms  = $c->home_timeline(); // done





?>
<h2>发送新微博</h2>
<form action="weibolist.php" >
<input type="text" name="text" style="width:300px" />
&nbsp;<input type="submit" />
</form>
<?php

if( isset($_REQUEST['text']) )
{
$c->update( $_REQUEST['text'] );
// 发送微博
$teststring= 'test '.$msg['id'].' '.$msg['name'].' '.$msg['city'].' '.$msg['description'];
echo $teststring;
	$o->post( "http://api.t.sina.com.cn/statuses/update.json" , array( 'status' => $msg['name'] ) );
	//$o->post( "http://api.t.sina.com.cn/statuses/update.json" , array( 'status' => $_REQUEST['text'] ) );
	echo "<p>发送完成</p>";

}

?>

<?php if( is_array( $ms ) ): ?>
<?php foreach( $ms as $item ): ?>
<div style="padding:10px;margin:5px;border:1px solid #ccc">
<?=$item['text'];?>
</div>
<?php endforeach; ?>
<?php endif; ?>



</body>
</html>