<?php

	function isRecall(){

	// 该函数用于检测用户是否在回忆模式，是1否0

		$isRecall = 0;
		if ($_GET['recall']=="1"){
			//echo "正在回忆模式";
			$isRecall = 1;
		}
		return $isRecall;
	}


	function isRandom(){

	// 该函数用于检测用户是否点击随机排序，是1否0

		$isRandom = 0;
		if ($_GET['random']=="1"){
			//echo "正在随机排序";
			$isRandom = 1;
		}
		return $isRandom;
	}


?>