<?php
	
//HTML脚本字符转存为安全字符

function HtmlToTxt($SourceStr) 
	{
	$str=str_replace("/","&slash",$SourceStr);
	$str=str_replace("\\","&backslash",$str);
	$str=str_replace("<","&lt;",$str);
	$str=str_replace(">","&gt;",$str);
	$str=str_replace("'","&dash",$str);
	//echo $str;
	return $str;
	}


//安全字符还原为HTML脚本字符

function TxtToHtml($SourceStr) 
	{
	$str=str_replace("&slash","/",$SourceStr);
	$str=str_replace("&backslash","\\",$str);
	$str=str_replace("&lt;","<",$str);
	$str=str_replace("&gt;",">",$str);
	$str=str_replace("&dash","'",$str);
	//echo $str;
	return $str;
	}




?>