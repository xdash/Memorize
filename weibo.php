<?php 

session_start();


if( isset($_SESSION['last_key']) )

	$isLogin="1";

else

	header('Location: index.php');




include_once( 'config.php' );
include_once( 'includes/common.php' );
include_once( 'saet.ex.class.php' );



?>





<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns=" http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<link type="text/css" rel="stylesheet" href="/css/style.css" /> 
	<title>Weibo - Memorize</title>
</head>
<body>

<div id="container"> 


<?php include_once( 'header.php' );?>


<div id="content">



<?php

		mysql_select_db(App_MysqlName); // 选择数据库
		mysql_query("set names utf8");	// 设置编码为UTF-8



		// 查询待发送的Item

		$ItemID=$_GET['id'];

		$sql = "SELECT * FROM items WHERE id='".$ItemID."'";
		$res = mysql_query($sql) or die(mysql_error());
		while( $obj = mysql_fetch_object($res)){
			$WeiboItem = $obj->item;
			$WeiboDescription = $obj->description;
		}

?>

		<form method="post" action="weibo.php?id=<?php echo $ItemID ?>"> 
		
			<div align="center">

				<input type="hidden"	name="nAction"		id="idAction"	value="weibo" />
				<input type="hidden"	name="nId"			id="idId"		value="<?php echo $ItemID ?>" />

				<br />
				  
				<label for="nWeibo"><small>Content:</small></label>
				<textarea name="nWeibo" id="idWeibo" cols="40" rows="5">我分享了一个词条：【<?php echo TxtToHtml($WeiboItem)  ?>】<?php echo TxtToHtml($WeiboDescription)  ?> // 测试 @xdash"  /></textarea>

			</div>

				<br/>

		<div align="center">
			<input id="idSubmit" value="      Post      " type="submit" />
		</div>

	 </form> 



</div>

</div>




<?php include_once( 'footer.php' );?>


</body>


</html>