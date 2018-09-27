<?php
//sleep(1);
if (empty($_GET['term']))exit();
$str = strtolower($_GET["term"]);
if(get_magic_quotes_gpc()) $str = stripslashes($str);

$items = array();

$fp=fopen(dirname(__FILE__)."/words.txt","rt");

while(!feof($fp)) 
{
	$word=trim(strtolower(fgets($fp)));
	$items[$word] = $word;
}
 
fclose($fp);

$result = array();
foreach ($items as $key=>$value) {
	if (strpos(strtolower($key), $str) === 0) {
		array_push($result, array("id"=>$value, "label"=>$key, "value" => strip_tags($key)));
	}
	if (count($result) > 11)
		break;
}

//print_r($result);
echo json_encode($result);
?>
