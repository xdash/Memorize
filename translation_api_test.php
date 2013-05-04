<?php


$xml_array = simplexml_load_file("http://fanyi.youdao.com/openapi.do?keyfrom=Memorize&key=572409860&type=data&doctype=xml&version=1.1&q=test");

foreach($xml_array as $tmp){  
echo $tmp->explains."-".$tmp->value."-".$tmp->ex."<br>";  
}

?>