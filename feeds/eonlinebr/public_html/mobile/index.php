<?php
$ufeed="brasil";

$agent="";
$agent = $_SERVER['HTTP_USER_AGENT'];  
$mobile=0;
 
if(strpos($agent, "iPhone")==TRUE){
	$mobile=1;
}elseif(strpos($agent, "Android")==TRUE){
	$mobile=1;
}elseif(strpos($agent, "BlackBerry")==TRUE){
	$mobile=1;
}elseif(strpos($agent, "iPod")==TRUE){
	$mobile=1;
}

if($mobile==0){
	$var_url="http://br.eonline.com/";
	exit("<script>location.href='".$var_url."';</script>");    
}

$name="Brasil";
$dbname="eonlinebr_eonlinedb";
$volver="Volver";

$dbhost="preprodabzdb";

$dbuser="eonline_usr";
$dbpass="30nl1n3";

$chandle = mysql_connect($dbhost, $dbuser, $dbpass);
if (!$chandle){
		$error = msg_error_conexion;
	}else{
		$db_selected= mysql_select_db($dbname, $chandle);
		if (!$db_selected) {
			$error = msg_error_conexion;
		}
	}
//echo mysql_error();

$post_name=explode("/", $_GET["url"]);
//print_r($post_name);

$post_name=$post_name[4];
//$post_name=$post_name[3];
//exit("---".$post_name);


$sql="SELECT ID
FROM wp_posts
WHERE post_name='".$post_name."' AND post_status='publish' AND post_type='post' AND post_content<>''
ORDER BY post_date DESC LIMIT 1";
$query = mysql_query($sql);
$row = mysql_fetch_array($query);
$id=$row["ID"];

if($id!=0){
	$var_url="http://br.eonline.com/mobile/reader.php?id=".$id;
	exit("<script>location.href='".$var_url."';</script>");    
}else{
	$var_url="http://br.eonline.com/mobile/parser.php";
	exit("<script>location.href='".$var_url."';</script>");    
}
?>