<?php
	
//HTML�ű��ַ�ת��Ϊ��ȫ�ַ�

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


//��ȫ�ַ���ԭΪHTML�ű��ַ�

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