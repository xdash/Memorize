<?php 
include_once( 'recall.php' ); 
?>

<div id="header">

<?php
	$txtSelected="";
	if ($_SERVER["REQUEST_URI"] == "/list.php") $txtSelected = "class='selected'"; 
?>


    <ul id="nav"> 

	    <li><a title="本日单词列表" href="list.php" <?php if (strpos($_SERVER["REQUEST_URI"],"list.php")>0) echo "class='selected'"; ?>>Home</a></li> 
        <li><a title="最近添加单词" href="latest.php" <?php if (strpos($_SERVER["REQUEST_URI"],"latest.php")>0) echo "class='selected'"; ?>>Latest</a></li> 
        <li><a title="导出为纯文本" href="export.php" <?php if (strpos($_SERVER["REQUEST_URI"],"export.php")>0) echo "class='selected'"; ?>>Export</a></li>

		<?php 
		// 是否回忆模式（recall==1 是  0不是）
		if (isRecall() == 1) {
			echo "<li><a title='点击关闭回忆模式' href='".$_SERVER['PHP_SELF']."'>[Recall:ON]</a></li>";}
		elseif (isRecall() == 0){
			echo "<li><a title='点击开启回忆模式' href='".$_SERVER['PHP_SELF']."?recall=1'>[Recall:OFF]</a></li>";}
		?>


		<?php 
		// 随机模式（random==1 是  0不是）或普通模式
			echo "<li>[<a title='点击切换到按时间排序' href='".$_SERVER['PHP_SELF']."'>O</a>"."|"
			."<a title='点击切换到随机排序' href='".$_SERVER['PHP_SELF']."?random=1'>R</a>"."]</li>";
		?>


		<!-- <li><a title="统计数据"		href="#" <?php if ($_SERVER["REQUEST_URI"] == "/stat.php") echo "class='selected'"; ?>>Stat</a></li> -->
        <!-- <li><a title="设置"			href="#" <?php if ($_SERVER["REQUEST_URI"] == "/settings.php") echo "class='selected'"; ?>>Settings</a></li> -->

    </ul> 

    <ul id="nav_add"> <li> <a title="增加单词" href="add.php">+ Add Items</a> </li> </ul> 

</div>